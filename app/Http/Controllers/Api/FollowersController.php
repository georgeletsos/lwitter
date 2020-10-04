<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\User;

class FollowersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function __invoke(User $user)
    {
        return UserResource::collection($user->followers()->get());
    }
}
