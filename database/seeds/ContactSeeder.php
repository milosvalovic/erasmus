<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact')->insert([
            'firstname' => 'Silvia',
            'lastname' => 'Hrozenská',
            'title_before_name' => 'Ing.',
            'title_after_name' => 'PhD.',
            'workplace' => 'Oddelenie pre medzinárodné vzťahy',
            'telephone_work' => '+421 37 6408 035',
            'phone' => '+421 948 261622',
            'room' => 'THA217',
            'email' => 'shrozenska@ukf.sk'
        ]);

        DB::table('contact')->insert([
            'firstname' => 'Katarína',
            'lastname' => 'Butorová',
            'title_before_name' => 'Ing.',
            'title_after_name' => 'PhD.',
            'workplace' => 'Oddelenie pre medzinárodné vzťahy',
            'telephone_work' => 'tel/fax: +421 37 6408 031',
            'phone' => null,
            'room' => 'THA211',
            'email' => 'kbutorova@ukf.sk'
        ]);

        DB::table('contact')->insert([
            'firstname' => 'Anita',
            'lastname' => 'Garajová',
            'title_before_name' => 'Ing.',
            'title_after_name' => 'PhD.',
            'workplace' => 'Oddelenie pre medzinárodné vzťahy',
            'telephone_work' => 'tel/fax: +421 37 6408 031',
            'phone' => null,
            'room' => null,
            'email' => 'agarajova@ukf.sk'
        ]);

        DB::table('contact')->insert([
            'firstname' => 'Pavol',
            'lastname' => 'Vakoš',
            'title_before_name' => 'Mgr.',
            'title_after_name' => null,
            'workplace' => 'Oddelenie pre medzinárodné vzťahy',
            'telephone_work' => '+421 37 6408 120',
            'phone' => '+421 948 492596',
            'room' => null,
            'email' => 'pvakos@ukf.sk'
        ]);
    }
}
