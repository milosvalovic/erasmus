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
            'name' => 'Rakúsko',
            'country_code' => 'at',
            'erasmus_code' => 'a'
        ]);

        DB::table('countries')->insert([
            'name' => 'Belgicko',
            'country_code' => 'be',
            'erasmus_code' => 'b'
        ]);

        DB::table('countries')->insert([
            'name' => 'Cyprus',
            'country_code' => 'cy',
            'erasmus_code' => 'cy'
        ]);

        DB::table('countries')->insert([
            'name' => 'Česko Republika',
            'country_code' => 'cz',
            'erasmus_code' => 'cz'
        ]);

        DB::table('countries')->insert([
            'name' => 'Dánsko',
            'country_code' => 'dk',
            'erasmus_code' => 'v'
        ]);

        DB::table('countries')->insert([
            'name' => 'Estónsko',
            'country_code' => 'ee',
            'erasmus_code' => 'ee'
        ]);

        DB::table('countries')->insert([
            'name' => 'Fínsko',
            'country_code' => 'fi',
            'erasmus_code' => 'sf'
        ]);

        DB::table('countries')->insert([
            'name' => 'Francúzsko',
            'country_code' => 'fe',
            'erasmus_code' => 'f'
        ]);

        DB::table('countries')->insert([
            'name' => 'Nemecko',
            'country_code' => 'de',
            'erasmus_code' => 'd'
        ]);

        DB::table('countries')->insert([
            'name' => 'Grécko',
            'country_code' => 'gr',
            'erasmus_code' => 'g'
        ]);

        DB::table('countries')->insert([
            'name' => 'Maďarsko',
            'country_code' => 'hu',
            'erasmus_code' => 'hu'
        ]);

        DB::table('countries')->insert([
            'name' => 'Írsko',
            'country_code' => 'ie',
            'erasmus_code' => 'irl'
        ]);

        DB::table('countries')->insert([
            'name' => 'Taliansko',
            'country_code' => 'it',
            'erasmus_code' => 'i'
        ]);

        DB::table('countries')->insert([
            'name' => 'Lotyšsko',
            'country_code' => 'lv',
            'erasmus_code' => 'lv'
        ]);

        DB::table('countries')->insert([
            'name' => 'Litva',
            'country_code' => 'lt',
            'erasmus_code' => 'lt'
        ]);

        DB::table('countries')->insert([
            'name' => 'Luxembursko',
            'country_code' => 'lu',
            'erasmus_code' => 'lux'
        ]);

        DB::table('countries')->insert([
            'name' => 'Malta',
            'country_code' => 'mt',
            'erasmus_code' => 'mt'
        ]);

        DB::table('countries')->insert([
            'name' => 'Holandsko',
            'country_code' => 'nl',
            'erasmus_code' => 'nl'
        ]);

        DB::table('countries')->insert([
            'name' => 'Protugalsko',
            'country_code' => 'PT',
            'erasmus_code' => 'P'
        ]);

        DB::table('countries')->insert([
            'name' => 'Slovensko',
            'country_code' => 'sk',
            'erasmus_code' => 'sk'
        ]);

        DB::table('countries')->insert([
            'name' => 'Slovinsko',
            'country_code' => 'si',
            'erasmus_code' => 'si'
        ]);

        DB::table('countries')->insert([
            'name' => 'Španielsko',
            'country_code' => 'es',
            'erasmus_code' => 'e'
        ]);

        DB::table('countries')->insert([
            'name' => 'Švédsko',
            'country_code' => 'se',
            'erasmus_code' => 's'
        ]);

        DB::table('countries')->insert([
            'name' => 'Veľká Británia',
            'country_code' => 'uk',
            'erasmus_code' => 'uk'
        ]);

        DB::table('countries')->insert([
            'name' => 'Island',
            'country_code' => 'is',
            'erasmus_code' => 'is'
        ]);

        DB::table('countries')->insert([
            'name' => 'Lichtenštajnsko',
            'country_code' => 'li',
            'erasmus_code' => 'fl'
        ]);

        DB::table('countries')->insert([
            'name' => 'Nórsko',
            'country_code' => 'no',
            'erasmus_code' => 'n'
        ]);

        DB::table('countries')->insert([
            'name' => 'Bulharsko',
            'country_code' => 'bg',
            'erasmus_code' => 'bg'
        ]);

        DB::table('countries')->insert([
            'name' => 'Poľsko',
            'country_code' => 'pl',
            'erasmus_code' => 'pl'
        ]);

        DB::table('countries')->insert([
            'name' => 'Rumunsko',
            'country_code' => 'ro',
            'erasmus_code' => 'ro'
        ]);

        DB::table('countries')->insert([
            'name' => 'Turecko',
            'country_code' => 'tr',
            'erasmus_code' => 'tr'
        ]);
    }
}
