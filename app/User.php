<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
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
     * Scope a query to include users with name like the given name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrWhereName($query, $name)
    {
        return $query->orWhere('name', 'like', "%$name%");
    }

    /**
     * Scope a query to include users with username like the given username.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $username
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrWhereUsername($query, $username)
    {
        return $query->orWhere('username', 'like', "%$username%");
    }

    /**
     * Scope a query to include users with email like the given email.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $email
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrWhereEmail($query, $email)
    {
        return $query->orWhere('email', 'like', "%$email%");
    }

    /**
     * Apply the request filters to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function filterBy(Request $request, Builder $query = NULL)
    {
        if (is_null($query)) {
            $query = self::query();
        }

        if ($request->filled('name')) {
            $query->orWhereName($request->query('name'));
        }

        if ($request->filled('username')) {
            $query->orWhereUsername($request->query('username'));
        }

        if ($request->filled('email')) {
            $query->orWhereEmail($request->query('email'));
        }

        return $query;
    }

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
