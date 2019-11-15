<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'name' => 'ERAZMUS'
        ]);

        DB::table('category')->insert([
            'name' => 'CEEPUS'
        ]);

        DB::table('category')->insert([
            'name' => 'Nezaradené'
        ]);
    }
}
