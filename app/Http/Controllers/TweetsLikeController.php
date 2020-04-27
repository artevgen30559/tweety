<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetsLikeController extends Controller
{
    public function store(Tweet $tweet) {
        $tweet->like();

        return back();
    }

    public function destroy(Tweet $tweet) {
        $tweet->dislike();

        return back();
    }
}
