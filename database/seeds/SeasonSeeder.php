<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('season')->insert([
            'date_start_reg' => '2019-11-08',
            'date_end_reg' => '2020-11-08',
            'count_students' => 10,
            'count_registrations' => 10,
            'mobility_ID' => 1,
            'date_start_mobility' => '2019-11-01',
            'date_end_mobility' => '2019-11-07'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2019-12-01',
            'date_end_reg' => '2020-12-01',
            'count_students' => 20,
            'count_registrations' => 20,
            'mobility_ID' => 2,
            'date_start_mobility' => '2019-11-25',
            'date_end_mobility' => '2019-11-28'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2020-01-01',
            'date_end_reg' => '2020-09-09',
            'count_students' => 30,
            'count_registrations' => 30,
            'mobility_ID' => 3,
            'date_start_mobility' => '2019-12-20',
            'date_end_mobility' => '2019-12-28'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2020-02-05',
            'date_end_reg' => '2020-10-05',
            'count_students' => 40,
            'count_registrations' => 40,
            'mobility_ID' => 4,
            'date_start_mobility' => '2020-02-01',
            'date_end_mobility' => '2020-02-04'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2020-03-20',
            'date_end_reg' => '2020-10-20',
            'count_students' => 30,
            'count_registrations' => 30,
            'mobility_ID' => 5,
            'date_start_mobility' => '2020-03-03',
            'date_end_mobility' => '2020-03-19'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2020-03-20',
            'date_end_reg' => '2020-11-20',
            'count_students' => 20,
            'count_registrations' => 20,
            'mobility_ID' => 6,
            'date_start_mobility' => '2020-03-11',
            'date_end_mobility' => '2020-03-19'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2020-04-25',
            'date_end_reg' => '2020-12-25',
            'count_students' => 10,
            'count_registrations' => 10,
            'mobility_ID' => 7,
            'date_start_mobility' => '2020-04-01',
            'date_end_mobility' => '2020-04-24'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2020-05-11',
            'date_end_reg' => '2020-12-29',
            'count_students' => 20,
            'count_registrations' => 20,
            'mobility_ID' => 8,
            'date_start_mobility' => '2020-05-02',
            'date_end_mobility' => '2020-05-10'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2019-11-08',
            'date_end_reg' => '2020-11-08',
            'count_students' => 10,
            'count_registrations' => 10,
            'mobility_ID' => 9,
            'date_start_mobility' => '2019-11-01',
            'date_end_mobility' => '2019-11-07'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2019-12-01',
            'date_end_reg' => '2020-12-01',
            'count_students' => 20,
            'count_registrations' => 20,
            'mobility_ID' => 10,
            'date_start_mobility' => '2019-11-25',
            'date_end_mobility' => '2019-11-28'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2020-01-01',
            'date_end_reg' => '2020-09-09',
            'count_students' => 30,
            'count_registrations' => 30,
            'mobility_ID' => 11,
            'date_start_mobility' => '2019-12-20',
            'date_end_mobility' => '2019-12-28'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2020-02-05',
            'date_end_reg' => '2020-10-05',
            'count_students' => 40,
            'count_registrations' => 40,
            'mobility_ID' => 12,
            'date_start_mobility' => '2020-02-01',
            'date_end_mobility' => '2020-02-04'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2020-03-20',
            'date_end_reg' => '2020-10-20',
            'count_students' => 30,
            'count_registrations' => 30,
            'mobility_ID' => 13,
            'date_start_mobility' => '2020-03-03',
            'date_end_mobility' => '2020-03-19'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2020-03-20',
            'date_end_reg' => '2020-11-20',
            'count_students' => 20,
            'count_registrations' => 20,
            'mobility_ID' => 14,
            'date_start_mobility' => '2020-03-11',
            'date_end_mobility' => '2020-03-19'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2020-04-25',
            'date_end_reg' => '2020-12-25',
            'count_students' => 10,
            'count_registrations' => 10,
            'mobility_ID' => 15,
            'date_start_mobility' => '2020-04-01',
            'date_end_mobility' => '2020-04-24'
        ]);

        DB::table('season')->insert([
            'date_start_reg' => '2020-05-11',
            'date_end_reg' => '2020-12-29',
            'count_students' => 20,
            'count_registrations' => 20,
            'mobility_ID' => 16,
            'date_start_mobility' => '2020-05-02',
            'date_end_mobility' => '2020-05-10'
        ]);
    }
}