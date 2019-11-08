<?php

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'reviews_ID' => 1,
            'url' => '1.jpg',
        ]);

        DB::table('images')->insert([
            'reviews_ID' => 2,
            'url' => '2.jpg',
        ]);

        DB::table('images')->insert([
            'reviews_ID' => 3,
            'url' => '3.jpg',
        ]);

        DB::table('images')->insert([
            'reviews_ID' => 4,
            'url' => '4.jpg',
        ]);
    }
}