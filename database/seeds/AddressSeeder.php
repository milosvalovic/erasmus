<?php

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->insert([
            'street' => 'Tr. A. Hlinku 1',
            'address' => '949 74 Nitra'
        ]);
    }
}
