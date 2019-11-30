<?php

namespace App\Http\Controllers\client;

use App\Http\Variables;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Office_Hours;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class MobilitiesController extends Controller
{
    public function mobilities()
    {
        return view('client.app.mobilities',
            ['contact' => array_chunk(Contact::all()->toArray(), Variables::NUMBER_OF_CONTACT_ROW),
                'office_hours' => Office_Hours::all(),
                'address' => Address::all(),
                'mobilities' => Season::simplePaginate(Variables::NUMBER_OF_MOBILITY_ITEMS),
                'mobility_in_row' => Variables::NUMBER_OF_MOBILITIES_IN_ROW,
                'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW
            ]);
    }

    public function mobilityByType(Request $request)
    {
        $typeID = $request->query('id');
        $take = $request->query('pocet');
        $skip = $request->query('skok');

        if(($take - $skip) == Variables::NUMBER_OF_MOBILITIES_IN_ROW){
            return view('client.app.mobilities',
                ['contact' => array_chunk(Contact::all()->toArray(), Variables::NUMBER_OF_CONTACT_ROW),
                    'office_hours' => Office_Hours::all(),
                    'address' => Address::all(),
                    'mobilities' => $this->getMobilityTypes($typeID, $take, $skip),
                    'number_of_mobilities' => $this->getCountOfMobilityTypes($typeID),
                    'mobility_in_row' => Variables::NUMBER_OF_MOBILITIES_IN_ROW,
                    'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW
                ]);
        }else{
            return view('errors.404');
        }
    }

    private function getMobilityTypes($typeID, $take, $skip)
    {
        $offset = Variables::TIME_OFFSET;

        return Season::whereHas('mobility', function($q) use($typeID) {
            $q->where('mobility_types_ID', $typeID);})
            ->where('date_end_reg', '>', Carbon::now($offset))
            ->where('season.date_end_reg', '>', Carbon::now($offset))
            ->take($take)
            ->skip($skip)
            ->get();
    }

    private function getCountOfMobilityTypes($typeID){
        $offset = Variables::TIME_OFFSET;

        return Season::whereHas('mobility', function($q) use($typeID) {
            $q->where('mobility_types_ID', $typeID);})
            ->where('date_end_reg', '>', Carbon::now($offset))
            ->where('season.date_end_reg', '>', Carbon::now($offset))
            ->get()
            ->count();
    }
}