<?php

namespace App\Policies;

use App\Tweet;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TweetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Tweet  $tweet
     * @return mixed
     */
    public function delete(User $user, Tweet $tweet)
    {
        return $user->id === $tweet->user_id;
    }
}
