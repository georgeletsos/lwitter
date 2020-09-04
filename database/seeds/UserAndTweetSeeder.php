<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAndTweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /****************************
         ****** Insert my User ******
         ****************************/
        factory('App\User')->create([
            'email' => 'guest@gmail.com',
            'password' => Hash::make('11111111')
        ]);

        /******************************************
         ****** Insert 60 Tweets owned by me ******
         ******************************************/
        factory('App\Tweet', 60)->create([
            'user_id' => 1
        ]);

        /***************************************************************************************
         ****** Insert 69 more new Users with a random number between 6 and 9 Tweets each ******
         ***************************************************************************************/
        factory('App\User', 63)->create()->each(function ($user) {
            factory('App\Tweet', rand(6, 9))->create([
                'user_id' => $user->id
            ]);
        });
    }
}
