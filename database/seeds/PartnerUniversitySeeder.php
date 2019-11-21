<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'img_url' => '/uploads/mobilities/a.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-a.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => '10',
            'city' => 'Korfu',
            'address' => 'Korfu 123',
            'name' => 'IONIO PANEPISTIMIO',
            'acronym' => 'IP',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/b.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-b.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => '2',
            'city' => 'Leuvene',
            'address' => 'Leuvene 123',
            'name' => 'KU LEUVEN',
            'acronym' => 'KL',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/c.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-c.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 1,
            'city' => 'Wörthersee',
            'address' => 'Wörthersee 123',
            'name' => 'PÄDAGOGISCHE HOCHSCHULE KÄRNTEN, VIKTOR FRANKL HOCHSCHULE',
            'acronym' => 'PHKVFH',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/d.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-d.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 29,
            'city' => 'Radome',
            'address' => 'Radome 123',
            'name' => 'POLITECHNIKA RADOMSKA IM. KAZIMIERZA PUŁASKIEGO W RADOMIU',
            'acronym' => 'PRIKPWR',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/e.gif',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-e.gif'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 28,
            'city' => 'Ruse',
            'address' => 'Ruse 123',
            'name' => 'RUSENSKI UNIVERSITET',
            'acronym' => 'RU',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/f.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-f.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 19,
            'city' => 'Funchal',
            'address' => 'Funchal 123',
            'name' => 'UNIVERSIDADE DA MADEIRA',
            'acronym' => 'UDM',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/g.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-g.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 9,
            'city' => 'Kamenica',
            'address' => 'Kamenica 123',
            'name' => 'TECHNISCHE UNIVERSITAET CHEMNITZ',
            'acronym' => 'TUC',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/h.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-h.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 23,
            'city' => 'Sheffield',
            'address' => 'Western Bank 123',
            'name' => 'UNIVERSITY OF SHEFFIELD',
            'acronym' => 'UOS',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/i.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-i.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => '4',
            'city' => 'Olomouc',
            'address' => 'Křížkovského 511',
            'name' => 'UNIVERZITA PALACKEHO V OLOMOUCI',
            'acronym' => 'UPO',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/j.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-j.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => '1',
            'city' => 'Wien',
            'address' => 'Universitätsring 1',
            'name' => 'UNIVERSITÄT WIEN',
            'acronym' => 'UW',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/k.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-k.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 4,
            'city' => 'Ostrava',
            'address' => 'Křížkovského 123',
            'name' => 'OSTRAVSKÁ UNIVERZITA V OSTRAVĚ',
            'acronym' => 'OUO',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/l.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-l.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 4,
            'city' => 'Praha',
            'address' => 'Opletalova 38',
            'name' => 'UNIVERZITA KARLOVA V PRAZE',
            'acronym' => 'UKP',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/m.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-m.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 14,
            'city' => 'Vilniuse',
            'address' => 'Universiteto g. 3',
            'name' => 'VILNIAUS UNIVERSITETAS',
            'acronym' => 'VU',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/n.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-n.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 9,
            'city' => 'Bayreuthe',
            'address' => 'Universitätsstraße 30',
            'name' => 'UNIVERSITÄT BAYREUTH',
            'acronym' => 'UB',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/p.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-p.jpg'
        ]);

        DB::table('partner_university')->insert([
            'country_ID' => 4,
            'city' => 'Brno',
            'address' => ' Žerotínovo nám',
            'name' => 'MASARYKOVA UNIVERZITA',
            'acronym' => 'MU',
            'info' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
            'img_url' => '/uploads/mobilities/q.jpg',
            'thumb_url' => '/uploads/mobilities/thumb/thumb-q.jpg'
        ]);
    }
}
