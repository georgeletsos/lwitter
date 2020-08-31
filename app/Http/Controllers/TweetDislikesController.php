<?php

namespace App\Http\Controllers;

use App\Tweet;

class TweetDislikesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function store(Tweet $tweet)
    {
        $tweet->dislike(auth()->user());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        $user = auth()->user();

        if ($tweet->isDislikedBy($user)) {
            $tweet->removeDislike($user);
        }

        return back();
    }
}
