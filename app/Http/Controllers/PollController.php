<?php

namespace App\Http\Controllers;

use App\Ballot;
use App\Candidate;
use App\Http\Resources\CandidateResource;
use App\Http\Resources\VoterResource;
use App\Poll;
use App\Voter;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function show($slug, $token)
    {
        $poll = Poll::where('slug', $slug)->first();
        if (!$poll) {
            abort(404);
        }

        $voter = Voter::where('token', $token)->first();
        if (!$voter || $voter->poll_id != $poll->id) {
            abort(403);
        }

        return view('polls.show', compact('poll', 'voter'));
    }

    //    API Routes
    public function candidates(Request $request, $poll)
    {
        $candidates = Candidate::where('poll_id', $poll);
        if ($request->get('sort')) {
            switch ($request->get('sort')) {
                case 'votes':
                    $candidates = $candidates->withCount('ballots')->orderBy('ballots_count', 'DESC');
            }
        }
        return CandidateResource::collection($candidates->get());
    }

    public function getVoter($token)
    {
        return new VoterResource(Voter::where('token', $token)->first());
    }

    public function vote(Request $request, $poll)
    {

        $poll = Poll::find($poll);
        if (!$poll) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Poll does not exists'
            ]);
        }

        $voter = Voter::where('token', $request->get('token'))->first();
        if (!$voter || $voter->poll_id != $poll->id) {
            return response()->json([
                'status'  => 'error',
                'message' => 'You are not authorized to perform this action'
            ]);
        }

        if ($voter->ballots()->count() > 0) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Sorry, you have already casted your votes for this poll'
            ]);
        }

        $candidates = Candidate::whereIn('id', collect($request->get('candidates'))->map(function ($c) {
            return $c['id'];
        }))->where('poll_id', $poll->id)->get();

        if (count($candidates) <= 0) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Please select at least one candidate'
            ]);
        }
        if (count($candidates) > $poll->max_vote) {
            return response()->json([
                'status'  => 'error',
                'message' => 'You can select a maximum of ' . $poll->max_vote . ' candidate(s).'
            ]);
        }

        foreach ($candidates as $candidate) {
            $ballot = new Ballot();
            $ballot->poll_id = $poll->id;
            $ballot->voter_id = $voter->id;
            $ballot->candidate_id = $candidate->id;
            $ballot->save();
        }

        return response()->json([
            'status' => 'success',
            'voter'  => new VoterResource($voter)
        ]);
    }
}
