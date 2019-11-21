<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('presentations')->insert([
            'users_season_ID' => 1,
            'file_url' => '1.pptx'
        ]);

        DB::table('presentations')->insert([
            'users_season_ID' => 2,
            'file_url' => '2.pptx'
        ]);

        DB::table('presentations')->insert([
            'users_season_ID' => 3,
            'file_url' => '3.pptx'
        ]);

        DB::table('presentations')->insert([
            'users_season_ID' => 4,
            'file_url' => '4.pptx'
        ]);
    }
}
