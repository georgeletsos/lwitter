<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowSeeder extends Seeder
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

        for ($i = 0; $i < 999; $i++) {
            $validRecord = false;
            while (!$validRecord) {
                $follows = DB::table('follows')->get();

                $randomUserId = $faker->numberBetween(1, $usersCount);
                $randomFollowingUserId = $faker->numberBetween(1, $usersCount);
                while ($randomUserId === $randomFollowingUserId) {
                    $randomFollowingUserId = $faker->numberBetween(1, $usersCount);
                }

                $filterCb = function ($value) use ($randomUserId, $randomFollowingUserId) {
                    return $value->user_id === $randomUserId && $value->following_user_id === $randomFollowingUserId;
                };

                if ($follows->filter($filterCb)->count() === 0) {
                    $validRecord = true;
                }
            }

            $dateTimeThisDecade = $faker->dateTimeThisDecade();
            DB::table('follows')->insert([
                'user_id' => $randomUserId,
                'following_user_id' => $randomFollowingUserId,
                'created_at' =>  $dateTimeThisDecade,
                'updated_at' =>  $dateTimeThisDecade
            ]);
        }
    }
}
