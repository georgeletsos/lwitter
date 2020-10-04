<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'tweet_id'
    ];

    /**
     * Get the user of the dislike.
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
