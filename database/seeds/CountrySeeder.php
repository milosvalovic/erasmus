<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name' => 'Austria',
            'country_code' => 'at',
            'erasmus_code' => 'a'
        ]);

        DB::table('countries')->insert([
            'name' => 'Belgium',
            'country_code' => 'be',
            'erasmus_code' => 'b'
        ]);

        DB::table('countries')->insert([
            'name' => 'Cyprus',
            'country_code' => 'cy',
            'erasmus_code' => 'cy'
        ]);

        DB::table('countries')->insert([
            'name' => 'Czech Republic',
            'country_code' => 'cz',
            'erasmus_code' => 'cz'
        ]);

        DB::table('countries')->insert([
            'name' => 'Denmark',
            'country_code' => 'dk',
            'erasmus_code' => 'v'
        ]);

        DB::table('countries')->insert([
            'name' => 'Estonia',
            'country_code' => 'ee',
            'erasmus_code' => 'ee'
        ]);

        DB::table('countries')->insert([
            'name' => 'Finland',
            'country_code' => 'fi',
            'erasmus_code' => 'sf'
        ]);

        DB::table('countries')->insert([
            'name' => 'France',
            'country_code' => 'fe',
            'erasmus_code' => 'f'
        ]);

        DB::table('countries')->insert([
            'name' => 'Germany',
            'country_code' => 'de',
            'erasmus_code' => 'd'
        ]);

        DB::table('countries')->insert([
            'name' => 'Greece',
            'country_code' => 'gr',
            'erasmus_code' => 'g'
        ]);

        DB::table('countries')->insert([
            'name' => 'Hungary',
            'country_code' => 'hu',
            'erasmus_code' => 'hu'
        ]);

        DB::table('countries')->insert([
            'name' => 'Ireland',
            'country_code' => 'ie',
            'erasmus_code' => 'irl'
        ]);

        DB::table('countries')->insert([
            'name' => 'Italy',
            'country_code' => 'it',
            'erasmus_code' => 'i'
        ]);

        DB::table('countries')->insert([
            'name' => 'Latvia',
            'country_code' => 'lv',
            'erasmus_code' => 'lv'
        ]);

        DB::table('countries')->insert([
            'name' => 'Lithuania',
            'country_code' => 'lt',
            'erasmus_code' => 'lt'
        ]);

        DB::table('countries')->insert([
            'name' => 'Luxembourg',
            'country_code' => 'lu',
            'erasmus_code' => 'lux'
        ]);

        DB::table('countries')->insert([
            'name' => 'Malta',
            'country_code' => 'mt',
            'erasmus_code' => 'mt'
        ]);

        DB::table('countries')->insert([
            'name' => 'Netherlands',
            'country_code' => 'nl',
            'erasmus_code' => 'nl'
        ]);

        DB::table('countries')->insert([
            'name' => 'Portugal',
            'country_code' => 'PT',
            'erasmus_code' => 'P'
        ]);

        DB::table('countries')->insert([
            'name' => 'Slovakia',
            'country_code' => 'sk',
            'erasmus_code' => 'sk'
        ]);

        DB::table('countries')->insert([
            'name' => 'Slovenia',
            'country_code' => 'si',
            'erasmus_code' => 'si'
        ]);

        DB::table('countries')->insert([
            'name' => 'Spain',
            'country_code' => 'es',
            'erasmus_code' => 'e'
        ]);

        DB::table('countries')->insert([
            'name' => 'Sweden',
            'country_code' => 'se',
            'erasmus_code' => 's'
        ]);

        DB::table('countries')->insert([
            'name' => 'United Kingdom',
            'country_code' => 'uk',
            'erasmus_code' => 'uk'
        ]);

        DB::table('countries')->insert([
            'name' => 'Iceland',
            'country_code' => 'is',
            'erasmus_code' => 'is'
        ]);

        DB::table('countries')->insert([
            'name' => 'Liechtenstein',
            'country_code' => 'li',
            'erasmus_code' => 'fl'
        ]);

        DB::table('countries')->insert([
            'name' => 'Norway',
            'country_code' => 'no',
            'erasmus_code' => 'n'
        ]);

        DB::table('countries')->insert([
            'name' => 'Bulgaria',
            'country_code' => 'bg',
            'erasmus_code' => 'bg'
        ]);

        DB::table('countries')->insert([
            'name' => 'Poland',
            'country_code' => 'pl',
            'erasmus_code' => 'pl'
        ]);

        DB::table('countries')->insert([
            'name' => 'Romania',
            'country_code' => 'ro',
            'erasmus_code' => 'ro'
        ]);

        DB::table('countries')->insert([
            'name' => 'Turkey',
            'country_code' => 'tr',
            'erasmus_code' => 'tr'
        ]);
    }
}
