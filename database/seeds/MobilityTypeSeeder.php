<?php

use Illuminate\Database\Seeder;

class MobilityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mobility_types')->insert([
            'name' => 'Študijný pobyt',
            'property' => 'studijny_pobyt'
        ]);

        DB::table('mobility_types')->insert([
            'name' => 'Stáž',
            'property' => 'staz'
        ]);

        DB::table('mobility_types')->insert([
            'name' => 'Prednáškový pobyt',
            'property' => 'prednaskovy_pobyt'
        ]);

        DB::table('mobility_types')->insert([
            'name' => 'Školenie',
            'property' => 'skolenie'
        ]);
    }
}
