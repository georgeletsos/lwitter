<?php

namespace App;

trait Followable
{
    /**
     * Make user follow the given user.
     *
     * @param \App\User $user
     * @return void
     */
    public function follow(User $user)
    {
        return $this->following()
            ->attach($user);
    }

    /**
     * Make user unfollow the given user.
     *
     * @param \App\User $user
     * @return int
     */
    public function unfollow(User $user)
    {
        return $this->following()
            ->detach($user);
    }

    /**
     * Toggle user's following/unfollowing of the given user.
     *
     * @param \App\User $user
     * @return array
     */
    public function toggleFollow(User $user)
    {
        $this->following()
            ->toggle($user);
    }

    /**
     * Return whether the user is following the given user.
     *
     * @param \App\User $user
     * @return bool
     */
    public function isFollowing(User $user)
    {
        $userId = $user->id;

        $following = $this->following;
        if (isset($following)) {
            return $following->contains($userId);
        }

        return $this->following()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    /**
     * Get all the user's followers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'following_user_id',
            'user_id',
        )
            ->withTimestamps()
            ->latest('follows.created_at');
    }

    /**
     * Get all the following users that the user is following.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function following()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        )
            ->withTimestamps()
            ->latest('follows.created_at');
    }
}
