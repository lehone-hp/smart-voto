<?php

namespace App\Http\Controllers\User;

use App\Candidate;
use App\Http\Controllers\Controller;
use App\Image;
use App\Poll;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PollController extends Controller
{
    public function index(Request $request)
    {
        $search = [
            'q' => $request->get('q'),
            'status' => $request->get('status')
        ];

        $polls = new Poll();
        if ($search['q']) {
            $polls = $polls->where('name', 'like', '%'.$search['q'].'%');
        }

        if ($search['status']) {
            switch ($search['status']) {
                case 'On Going':
                    $polls = $polls->where('start_date', '<=', Carbon::now())
                        ->where('end_date', '>', Carbon::now());
                    break;
                case 'Not Started':
                    $polls = $polls->where('start_date', '>', Carbon::now());
                    break;
                case 'Closed':
                    $polls = $polls->where('end_date', '<=', Carbon::now());
                    break;
            }
        }

        $polls = $polls->where('user_id', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $status_opts = ['On Going', 'Not Started', 'Closed'];
        return view('user.polls.index', compact('polls', 'search', 'status_opts'));
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
            $image->imageable_id = $poll->id;
            $image->imageable_type = Poll::class;
            $image->save();
        }

        $c_names = collect($request->get('candidate_name'));
        $c_bios = collect($request->get('candidate_bio'));
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
