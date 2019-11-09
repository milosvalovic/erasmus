<?php

use Illuminate\Database\Seeder;

class UserSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_season')->insert([
            'users_ID' => 1,
            'season_ID' => 1,
        ]);

        DB::table('users_season')->insert([
            'users_ID' => 2,
            'season_ID' => 2,
        ]);

        DB::table('users_season')->insert([
            'users_ID' => 1,
            'season_ID' => 3,
        ]);

        DB::table('users_season')->insert([
            'users_ID' => 2,
            'season_ID' => 4,
        ]);
    }
}