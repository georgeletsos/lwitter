<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

    use Likeable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'body'
    ];

    /**
     * Scope a query to include the user of the tweet.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithUser($query)
    {
        return $query->with('user');
    }

    /**
     * Get the user of the tweet.
     * 
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
