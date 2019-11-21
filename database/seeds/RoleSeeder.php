<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'student',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);

        DB::table('roles')->insert([
            'name' => 'organizator',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);

        DB::table('roles')->insert([
            'name' => 'administrator',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
