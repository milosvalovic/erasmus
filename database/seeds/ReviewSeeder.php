<?php

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'users_season_ID' => 1,
            'review' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'rating' => 3
        ]);

        DB::table('reviews')->insert([
            'users_season_ID' => 2,
            'review' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'rating' => 4
        ]);

        DB::table('reviews')->insert([
            'users_season_ID' => 3,
            'review' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'rating' => 1
        ]);

        DB::table('reviews')->insert([
            'users_season_ID' => 4,
            'review' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'rating' => 0
        ]);
    }
}