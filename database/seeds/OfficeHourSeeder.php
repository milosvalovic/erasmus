<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('office_hours')->insert([
            'day' => 'Po',
            'from' => '08:30',
            'to' => '11:00',
            'off' => 1
        ]);

        DB::table('office_hours')->insert([
            'day' => 'Ut',
            'from' => null,
            'to' => null,
            'off' => 0
        ]);

        DB::table('office_hours')->insert([
            'day' => 'St',
            'from' => '08:30',
            'to' => '11:00',
            'off' => 1
        ]);

        DB::table('office_hours')->insert([
            'day' => 'Št',
            'from' => null,
            'to' => null,
            'off' => 0
        ]);

        DB::table('office_hours')->insert([
            'day' => 'Pi',
            'from' => null,
            'to' => null,
            'off' => 0
        ]);
    }
}
