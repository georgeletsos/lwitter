<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfile;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:update,user')->only(['edit', 'update']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (auth()->user()->is($user)) {
            $user = auth()->user();
            // auth()->user()->loadCount(['following', 'followers']) have already been loaded by the "Authenticate" middleware
        } else {
            $user->loadCount(['following', 'followers']);
        }

        $userTweets = $user
            ->tweets()
            ->withLikes()
            ->withLikesCount()
            ->withDislikes()
            ->withDislikesCount()
            ->simplePaginate(50);

        foreach ($userTweets as $tweet) {
            $tweet->user = $user;
        }

        return view(
            'profiles.show',
            [
                'user' => $user,
                'tweets' => $userTweets
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserProfile $request, User $user)
    {
        $validated = $request->validated();

        if (is_null($validated['password'])) {
            Arr::pull($validated, 'password');
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return redirect(route('profile', $user->username));
    }
}
