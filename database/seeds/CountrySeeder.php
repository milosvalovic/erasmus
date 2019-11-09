<?php

use Illuminate\Database\Seeder;

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
            'country_code' => 'AT',
            'erasmus_code' => 'A'
        ]);

        DB::table('countries')->insert([
            'name' => 'Belgium',
            'country_code' => 'BE',
            'erasmus_code' => 'B'
        ]);

        DB::table('countries')->insert([
            'name' => 'Cyprus',
            'country_code' => 'CY',
            'erasmus_code' => 'CY'
        ]);

        DB::table('countries')->insert([
            'name' => 'Czech Republic',
            'country_code' => 'CZ',
            'erasmus_code' => 'CZ'
        ]);

        DB::table('countries')->insert([
            'name' => 'Denmark',
            'country_code' => 'DK',
            'erasmus_code' => 'DK'
        ]);

        DB::table('countries')->insert([
            'name' => 'Estonia',
            'country_code' => 'EE',
            'erasmus_code' => 'EE'
        ]);

        DB::table('countries')->insert([
            'name' => 'Finland',
            'country_code' => 'FI',
            'erasmus_code' => 'SF'
        ]);

        DB::table('countries')->insert([
            'name' => 'France',
            'country_code' => 'FE',
            'erasmus_code' => 'F'
        ]);

        DB::table('countries')->insert([
            'name' => 'Germany',
            'country_code' => 'DE',
            'erasmus_code' => 'D'
        ]);

        DB::table('countries')->insert([
            'name' => 'Greece',
            'country_code' => 'GR',
            'erasmus_code' => 'G'
        ]);

        DB::table('countries')->insert([
            'name' => 'Hungary',
            'country_code' => 'HU',
            'erasmus_code' => 'HU'
        ]);

        DB::table('countries')->insert([
            'name' => 'Ireland',
            'country_code' => 'IE',
            'erasmus_code' => 'IRL'
        ]);

        DB::table('countries')->insert([
            'name' => 'Italy',
            'country_code' => 'IT',
            'erasmus_code' => 'I'
        ]);

        DB::table('countries')->insert([
            'name' => 'Latvia',
            'country_code' => 'LV',
            'erasmus_code' => 'LV'
        ]);

        DB::table('countries')->insert([
            'name' => 'Lithuania',
            'country_code' => 'LT',
            'erasmus_code' => 'LT'
        ]);

        DB::table('countries')->insert([
            'name' => 'Luxembourg',
            'country_code' => 'LU',
            'erasmus_code' => 'LUX'
        ]);

        DB::table('countries')->insert([
            'name' => 'Malta',
            'country_code' => 'MT',
            'erasmus_code' => 'MT'
        ]);

        DB::table('countries')->insert([
            'name' => 'Netherlands',
            'country_code' => 'NL',
            'erasmus_code' => 'NL'
        ]);

        DB::table('countries')->insert([
            'name' => 'Portugal',
            'country_code' => 'PT',
            'erasmus_code' => 'P'
        ]);

        DB::table('countries')->insert([
            'name' => 'Slovakia',
            'country_code' => 'SK',
            'erasmus_code' => 'SK'
        ]);

        DB::table('countries')->insert([
            'name' => 'Slovenia',
            'country_code' => 'SI',
            'erasmus_code' => 'SI'
        ]);

        DB::table('countries')->insert([
            'name' => 'Spain',
            'country_code' => 'ES',
            'erasmus_code' => 'E'
        ]);

        DB::table('countries')->insert([
            'name' => 'Sweden',
            'country_code' => 'SE',
            'erasmus_code' => 'S'
        ]);

        DB::table('countries')->insert([
            'name' => 'United Kingdom',
            'country_code' => 'UK',
            'erasmus_code' => 'UK'
        ]);

        DB::table('countries')->insert([
            'name' => 'Iceland',
            'country_code' => 'IS',
            'erasmus_code' => 'IS'
        ]);

        DB::table('countries')->insert([
            'name' => 'Liechtenstein',
            'country_code' => 'LI',
            'erasmus_code' => 'FL'
        ]);

        DB::table('countries')->insert([
            'name' => 'Norway',
            'country_code' => 'NO',
            'erasmus_code' => 'N'
        ]);

        DB::table('countries')->insert([
            'name' => 'Bulgaria',
            'country_code' => 'BG',
            'erasmus_code' => 'BG'
        ]);

        DB::table('countries')->insert([
            'name' => 'Poland',
            'country_code' => 'PL',
            'erasmus_code' => 'PL'
        ]);

        DB::table('countries')->insert([
            'name' => 'Romania',
            'country_code' => 'RO',
            'erasmus_code' => 'RO'
        ]);

        DB::table('countries')->insert([
            'name' => 'Turkey',
            'country_code' => 'TR',
            'erasmus_code' => 'TR'
        ]);
    }
}
