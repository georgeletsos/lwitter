<?php

namespace App\Http\Controllers;

use App\User;

class FollowingController extends Controller
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
        $following = $user
            ->following()
            ->simplePaginate(50);

        return view('profiles.following', [
            'user' => $user,
            'following' => $following
        ]);
    }
}
