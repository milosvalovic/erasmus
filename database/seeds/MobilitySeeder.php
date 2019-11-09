<?php

use Illuminate\Database\Seeder;

class MobilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mobility')->insert([
            'mobility_types_ID' => 1,
            'partner_university_ID' => 1,
            'grant' => 470,
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
        ]);

        DB::table('mobility')->insert([
            'mobility_types_ID' => 1,
            'partner_university_ID' => 2,
            'grant' => 420,
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
        ]);

        DB::table('mobility')->insert([
            'mobility_types_ID' => 2,
            'partner_university_ID' => 3,
            'grant' => 470,
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
        ]);

        DB::table('mobility')->insert([
            'mobility_types_ID' => 2,
            'partner_university_ID' => 4,
            'grant' => 420,
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
        ]);

        DB::table('mobility')->insert([
            'mobility_types_ID' => 3,
            'partner_university_ID' => 5,
            'grant' => 470,
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
        ]);

        DB::table('mobility')->insert([
            'mobility_types_ID' => 3,
            'partner_university_ID' => 6,
            'grant' => 420,
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
        ]);

        DB::table('mobility')->insert([
            'mobility_types_ID' => 4,
            'partner_university_ID' => 7,
            'grant' => 470,
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
        ]);

        DB::table('mobility')->insert([
            'mobility_types_ID' => 4,
            'partner_university_ID' => 8,
            'grant' => 420,
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
        ]);
    }
}
