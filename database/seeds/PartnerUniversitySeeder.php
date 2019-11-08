<?php

use Illuminate\Database\Seeder;

class PartnerUniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partner_university')->insert([
            'country_ID' => 19,
            'city' => 'PORTO',
            'address' => 'PORTO 123',
            'name' => 'INSTITUTO POLITECNICO DO PORTO',
            'acronym' => 'IPDP',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '1.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => '10',
            'city' => 'Korfu',
            'address' => 'Korfu 123',
            'name' => 'IONIO PANEPISTIMIO',
            'acronym' => 'IP',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '2.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => '2',
            'city' => 'Leuvene',
            'address' => 'Leuvene 123',
            'name' => 'KU LEUVEN',
            'acronym' => 'KL',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '3.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 1,
            'city' => 'Wörthersee',
            'address' => 'Wörthersee 123',
            'name' => 'PÄDAGOGISCHE HOCHSCHULE KÄRNTEN, VIKTOR FRANKL HOCHSCHULE',
            'acronym' => 'PHKVFH',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '4.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 29,
            'city' => 'Radome',
            'address' => 'Radome 123',
            'name' => 'POLITECHNIKA RADOMSKA IM. KAZIMIERZA PUŁASKIEGO W RADOMIU',
            'acronym' => 'PRIKPWR',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '5.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 28,
            'city' => 'Ruse',
            'address' => 'Ruse 123',
            'name' => 'RUSENSKI UNIVERSITET',
            'acronym' => 'RU',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '6.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 19,
            'city' => 'Funchal',
            'address' => 'Funchal 123',
            'name' => 'UNIVERSIDADE DA MADEIRA',
            'acronym' => 'UDM',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '7.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 9,
            'city' => 'Kamenica',
            'address' => 'Kamenica 123',
            'name' => 'TECHNISCHE UNIVERSITAET CHEMNITZ',
            'acronym' => 'TUC',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '8.jpg'
        ]);
    }
}
