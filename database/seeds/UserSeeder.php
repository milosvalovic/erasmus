<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'peter.varga@student.ukf.sk',
            'password' => bcrypt('asd123'),
            'first_name' => 'Peter',
            'last_name' => 'Varga',
            'roles_ID' => 1,
            'newsletter' => 1,
            'hash' => null
        ]);

        DB::table('users')->insert([
            'email' => 'michal.kralik@student.ukf.sk',
            'password' => bcrypt('asd123'),
            'first_name' => 'Michal',
            'last_name' => 'Králik',
            'roles_ID' => 1,
            'newsletter' => 1,
            'hash' => null
        ]);

        DB::table('users')->insert([
            'email' => 'shrozenska@ukf.sk',
            'password' => bcrypt('asd123'),
            'first_name' => 'Silvia',
            'last_name' => 'Hrozenská',
            'roles_ID' => 2,
            'newsletter' => 0,
            'hash' => null
        ]);

        DB::table('users')->insert([
            'email' => 'admin@ukf.sk',
            'password' => bcrypt('root123'),
            'first_name' => 'Root',
            'last_name' => 'Admin',
            'roles_ID' => 3,
            'newsletter' => 0,
            'hash' => null
        ]);
    }
}
