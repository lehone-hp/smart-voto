<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index() {
        return view('user.polls.index');
    }

    public function create() {
        return view('user.polls.create');
    }
}
