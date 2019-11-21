<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
