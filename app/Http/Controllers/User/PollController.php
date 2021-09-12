<?php

namespace App\Http\Controllers\User;

use App\Candidate;
use App\Http\Controllers\Controller;
use App\Image;
use App\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PollController extends Controller
{
    public function index()
    {
        return view('user.polls.index');
    }

    public function create()
    {
        return view('user.polls.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'            => 'required',
            'description'     => 'required',
            'image'           => 'nullable|image',
            'candidate_name' => 'required|array|min:2',
            'candidate_bio'  => 'required|array|min:2',
            'start_date'      => 'required',
            'end_date'        => 'required|after:start_date',
            'max_vote'        => 'required|integer|min:1'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->get('name') . ' ' . time());
        $poll = Poll::create($data);

        if ($request->file('image')) {
            $image = new Image();
            $image->path = $request->file('image')->store('polls');
            $poll->image()->save($image);
        }

        $c_names = collect($request->get('candidate_name'));
        $c_bios = collect($request->get('candidate_name'));
        for ($i = 0; $i < count($c_names); $i++) {
            Candidate::create([
                'poll_id'     => $poll->id,
                'name'        => $c_names[$i],
                'description' => $c_bios[$i]
            ]);
        }

        return redirect()->route('polls.show', $poll->slug);
    }

    public function show($slug)
    {
        $poll = Poll::where('slug', $slug)->first();
        if (!$poll) {
            abort(404);
        }

        return view('user.polls.show', compact('poll'));
    }
}
