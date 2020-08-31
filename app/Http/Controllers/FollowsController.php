<?php

namespace App\Http\Controllers;

use App\User;

class FollowsController extends Controller
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(User $user)
    {
        auth()
            ->user()
            ->follow($user);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        auth()
            ->user()
            ->unfollow($user);

        return back();
    }
}
