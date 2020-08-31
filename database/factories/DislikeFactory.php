<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dislike;
use App\Tweet;
use App\User;
use Faker\Generator as Faker;

$factory->define(Dislike::class, function (Faker $faker) {
    $dateTimeThisDecade = $faker->dateTimeThisDecade();
    $usersCount = User::count();
    $tweetsCount = Tweet::count();

    return [
        'user_id' => $faker->numberBetween(1, $usersCount),
        'tweet_id' => $faker->numberBetween(1, $tweetsCount),
        'created_at' => $dateTimeThisDecade,
        'updated_at' => $dateTimeThisDecade
    ];
});
