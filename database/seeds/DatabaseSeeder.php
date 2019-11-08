<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FAQSeeder::class);
        $this->call(MobilityTypeSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(PartnerUniversitySeeder::class);
        $this->call(MobilitySeeder::class);
        $this->call(SeasonSeeder::class);
        $this->call(SeasonStatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserSeasonSeeder::class);
        $this->call(StatusSeasonSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(PresentationSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(OfficeHourSeeder::class);
        $this->call(AddressSeeder::class);
    }
}
