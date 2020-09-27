<?php

namespace App;

trait Likeable
{
    /**
     * Scope a query to include all dislikes of the tweet.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithDislikes($query)
    {
        return $query->with('dislikes');
    }

    /**
     * Scope a query to include all likes of the tweet.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithLikes($query)
    {
        return $query->with('likes');
    }

    /**
     * Scope a query to include the sum of dislikes of the tweet.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithDislikesCount($query)
    {
        return $query->withCount('dislikes');
    }

    /**
     * Scope a query to include the sum of likes of the tweet.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithLikesCount($query)
    {
        return $query->withCount('likes');
    }

    /**
     * Remove the given user's dislike on the tweet.
     *
     * @return bool
     */
    public function removeDislike(User $user)
    {
        return Dislike::where([
            'user_id' => $user->id,
            'tweet_id' => $this->id
        ])->delete();
    }

    /**
     * Remove the given user's like on the tweet.
     *
     * @return bool
     */
    public function removeLike(User $user)
    {
        return Like::where([
            'user_id' => $user->id,
            'tweet_id' => $this->id
        ])->delete();
    }

    /**
     * Make the tweet be disliked by the given user,
     * after removing the possible like first.
     *
     * @param  User $user
     * @return Dislike
     */
    public function dislike(User $user)
    {
        $this->removeLike($user);

        return $this->dislikes()
            ->create([
                'user_id' => $user->id,
                'tweet_id' => $this->id
            ]);
    }

    /**
     * Make the tweet be liked by the given user,
     * after removing the possible dislike first.
     *
     * @param  User $user
     * @return Like
     */
    public function like(User $user)
    {
        $this->removeDislike($user);

        return $this->likes()
            ->create([
                'user_id' => $user->id,
                'tweet_id' => $this->id
            ]);
    }

    /**
     * Return whether the tweet is disliked by the user.
     *
     * @param User $user
     * @return bool
     */
    public function isDislikedBy(User $user)
    {
        $userId = $user->id;

        $dislikes = $this->dislikes;
        if (isset($dislikes)) {
            return $dislikes->contains('user_id', $userId);
        }

        return $this->dislikes()
            ->where('user_id', $userId)
            ->exists();
    }

    /**
     * Return whether the tweet is liked by the user.
     *
     * @param User $user
     * @return bool
     */
    public function isLikedBy(User $user)
    {
        $userId = $user->id;

        $likes = $this->likes;
        if (isset($likes)) {
            return $likes->contains('user_id', $userId);
        }

        return $this->likes()
            ->where('user_id', $userId)
            ->exists();
    }

    /**
     * Get all the dislikes of the tweet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }

    /**
     * Get all the likes of the tweet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
