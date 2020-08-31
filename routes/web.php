<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/home', 'TweetsController@index')->name('home');
Route::post('/tweets', 'TweetsController@store')->name('tweets');

Route::post('/tweets/{tweet}/like', 'TweetLikesController@store')->name('tweet.like');
Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy');

Route::post('/tweets/{tweet}/dislike', 'TweetDislikesController@store')->name('tweet.dislike');
Route::delete('/tweets/{tweet}/dislike', 'TweetDislikesController@destroy');

Route::get('/profiles/{user:username}', 'ProfilesController@show')->name('profile');
Route::get('/profiles/{user:username}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profiles/{user:username}', 'ProfilesController@update')->name('profile.update');

Route::get('/profiles/{user:username}/following', 'FollowingController')->name('profile.following');
Route::get('/profiles/{user:username}/followers', 'FollowersController')->name('profile.followers');
Route::post('/profiles/{user:username}/follow', 'FollowsController@store')->name('profile.follow');
Route::delete('/profiles/{user:username}/follow', 'FollowsController@destroy')->name('profile.unfollow');

Route::get('/explore', 'ExploreController')->name('explore');

Auth::routes();
