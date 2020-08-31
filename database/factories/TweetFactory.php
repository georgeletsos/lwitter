<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweet;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    $dateTimeThisDecade = $faker->dateTimeThisDecade();

    return [
        'user_id' => factory(App\User::class),
        'body' => $faker->sentence,
        'created_at' => $dateTimeThisDecade,
        'updated_at' => $dateTimeThisDecade
    ];
});
