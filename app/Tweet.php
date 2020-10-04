<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
     * Scope a query to include tweets with body like the given body.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $body
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrWhereBody($query, $body)
    {
        return $query->orWhere('body', 'like', "%$body%");
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

        if ($request->filled('body')) {
            $query->orWhereBody($request->query('body'));
        }

        return $query;
    }

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
