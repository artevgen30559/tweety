<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetsController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->getAllTweets()
        ]);
    }

    public function store(Request $request) {

        $validateAttributes = $request->validate([
           'body' => ['required', 'max:255']
        ]);

        Tweet::create([
           'user_id' => Auth::user()->id,
           'body' => $validateAttributes['body']
        ]);

        return back();
    }
}
