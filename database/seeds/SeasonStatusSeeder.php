<?php

use Illuminate\Database\Seeder;

class SeasonStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('season_status')->insert([
            'name' => 'Vybavuje sa'
        ]);

        DB::table('season_status')->insert([
            'name' => 'Prijatá'
        ]);

        DB::table('season_status')->insert([
            'name' => 'Zamietnutá'
        ]);

        DB::table('season_status')->insert([
            'name' => 'Vybavená'
        ]);
    }
}
