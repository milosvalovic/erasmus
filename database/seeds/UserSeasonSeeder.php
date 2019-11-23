<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
    }
}