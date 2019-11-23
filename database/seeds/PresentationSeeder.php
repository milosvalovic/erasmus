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
    }
}