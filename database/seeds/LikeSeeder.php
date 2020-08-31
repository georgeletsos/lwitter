<?php

use App\Dislike;
use App\Like;
use App\Tweet;
use App\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $usersCount = User::count();
        $tweetsCount = Tweet::count();

        for ($i = 0; $i < 999; $i++) {
            $validRecord = false;
            while (!$validRecord) {
                $likes = Like::all();
                $dislikes = Dislike::all();

                $randomUserId = $faker->numberBetween(1, $usersCount);
                $randomTweetId = $faker->numberBetween(1, $tweetsCount);
                $filterCb = function ($value) use ($randomUserId, $randomTweetId) {
                    return $value->user_id === $randomUserId && $value->tweet_id === $randomTweetId;
                };

                if ($likes->filter($filterCb)->count() === 0 && $dislikes->filter($filterCb)->count() === 0) {
                    $validRecord = true;
                }
            }

            factory('App\Like')->create([
                'user_id' => $randomUserId,
                'tweet_id' => $randomTweetId
            ]);
        }
    }
}
