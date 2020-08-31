<?php

namespace App\Http\Controllers;

use App\User;

class FollowersController extends Controller
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
     * Handle the incoming request.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function __invoke(User $user)
    {
        $followers = $user
            ->followers()
            ->simplePaginate(50);

        return view('profiles.followers', [
            'user' => $user,
            'followers' => $followers
        ]);
    }
}
