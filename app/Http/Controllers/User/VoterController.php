<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\VoterResource;
use App\Mail\VoterRegistration;
use App\Voter;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class VoterController extends Controller
{
    public function index($poll)
    {
        $voters = Voter::where('poll_id', $poll)
            ->orderBy('created_at', 'DESC')
            ->paginate(20);

        return VoterResource::collection($voters);
    }

    public function store(Request $request, $poll)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string',
            'email' => [
                'required', 'email',
                Rule::unique('voters')->where(function ($q) use ($poll) {
                    return $q->where('poll_id', $poll);
                })
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([
                    'status' => 'validation_error',
                    'errors' => $validator->errors()]
            );
        }


        $voter = new Voter();
        $voter->poll_id = $poll;
        $voter->name = $request->get('name');
        $voter->email = $request->get('email');
        $voter->token = (string)Str::uuid();
        $voter->save();

        try {
            Mail::to($voter->email)->send(new VoterRegistration($voter));
        } catch (\Exception $e) {}

        return response()->json([
            'status' => 'success',
            'voter'  => new VoterResource($voter)
        ]);
    }
}
