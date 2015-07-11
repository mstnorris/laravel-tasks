<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

use App\Task;
use App\User;
use Vinkla\Hashids\Facades\Hashids;

class ConstantsTableSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create('en_US');

        /*
         * Base User Accounts
         */

        // Mike's account
        $michael = User::create([
            'name'       => 'Michael Norris',
            'email'      => 'mstnorris@gmail.com',
            'password'   => bcrypt('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Sezer's account
        $sezer = User::create([
            'name'       => 'Sezer Tunca',
            'email'      => 'sezertunca@gmail.com',
            'password'   => bcrypt('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        for ( $i=1; $i <=10; $i++ ) {
        Task::create([
            'user_id' => $faker->randomElement([1,2]),
            'task_name' => $faker->realText(30)
        ]);
    }
    }
}
