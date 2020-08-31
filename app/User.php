<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get a list of tweets of users that the user is NOT following.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function explore()
    {
        $followingUsers = $this
            ->following()
            ->pluck('id');

        return Tweet::where('user_id', '<>', $this->id)
            ->whereNotIn('user_id', $followingUsers)
            ->withUser()
            ->withLikes()
            ->withLikesCount()
            ->withDislikes()
            ->withDislikesCount()
            ->latest()
            ->simplePaginate(50);
    }

    /**
     * Get a list of tweets of users that the user is following.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function feed()
    {
        $followingUsers = $this
            ->following()
            ->pluck('id');

        return Tweet::where('user_id', $this->id)
            ->orWhereIn('user_id', $followingUsers)
            ->withUser()
            ->withLikes()
            ->withLikesCount()
            ->withDislikes()
            ->withDislikesCount()
            ->latest()
            ->simplePaginate(50);
    }

    /**
     * Get all the tweets of the user sorted by latest.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tweets()
    {
        return $this->hasMany(Tweet::class)
            ->latest();
    }
}
