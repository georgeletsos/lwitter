<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->namespace('Api')->group(function () {
    Route::apiResources([
        'users' => 'UsersController',
        'tweets' => 'TweetsController'
    ]);

    Route::get('users/{user}/following', 'FollowingController');
    Route::get('users/{user}/followers', 'FollowersController');
});
