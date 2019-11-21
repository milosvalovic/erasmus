<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'url' => '/uploads/reviews/1.jpg',
            'thumb_url' => '/uploads/reviews/thumb/thumb-1.jpg',
        ]);

        DB::table('images')->insert([
            'reviews_ID' => 2,
            'url' => '/uploads/reviews/2.jpg',
            'thumb_url' => '/uploads/reviews/thumb/thumb-2.jpg',
        ]);

        DB::table('images')->insert([
            'reviews_ID' => 3,
            'url' => '/uploads/reviews/3.jpg',
            'thumb_url' => '/uploads/reviews/thumb/thumb-3.jpg',
        ]);

        DB::table('images')->insert([
            'reviews_ID' => 4,
            'url' => '/uploads/reviews/4.jpg',
            'thumb_url' => '/uploads/reviews/thumb/thumb-4.jpg',
        ]);
    }
}