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
            'name' => 'Študijný pobyt'
        ]);

        DB::table('mobility_types')->insert([
            'name' => 'Stáž'
        ]);

        DB::table('mobility_types')->insert([
            'name' => 'Prednáškový pobyt'
        ]);

        DB::table('mobility_types')->insert([
            'name' => 'Školenie'
        ]);
    }
}
