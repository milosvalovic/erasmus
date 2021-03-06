<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_season')->insert([
            'season_status_ID' => 1,
            'users_season_ID' => 1,
            'users_ID' => 1
        ]);

        DB::table('status_season')->insert([
            'season_status_ID' => 2,
            'users_season_ID' => 2,
            'users_ID' => 2
        ]);
    }
}
