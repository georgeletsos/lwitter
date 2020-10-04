<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreTweet;
use App\Http\Resources\Tweet as TweetResource;
use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    /**
     * Display a listing of the resource with optional filters.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TweetResource::collection(Tweet::filterBy($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTweet $request)
    {
        $validated = $request->validated();

        $newTweet = Tweet::create([
            'user_id' => $validated['user_id'],
            'body' => $validated['body'],
        ]);

        return new TweetResource($newTweet);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tweet = Tweet::withUser()
            ->with([
                'likes.user',
                'dislikes.user'
            ])
            ->findOrFail($id);

        return new TweetResource($tweet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return new TweetResource($tweet);
    }
}
