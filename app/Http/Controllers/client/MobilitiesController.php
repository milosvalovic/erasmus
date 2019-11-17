<?php

namespace App\Http\Controllers\client;


use App\Http\Variables;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Mobility;
use App\Models\Office_Hours;
use App\Models\Season;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class MobilitiesController extends Controller
{
    public function mobilities()
    {
        return view('client.app.mobilities',
            ['contact' => array_chunk(Contact::all()->toArray(), Variables::NUMBER_OF_CONTACT_ROW),
                'office_hours' => Office_Hours::all(),
                'address' => Address::all(),
                'mobilities' => Season::simplePaginate(8),
            ]);
    }

    public function mobilityByType($typeID, $perPage)
    {
        $sortedMobility = $this->getTopMobilityType($typeID, '', $perPage)->sortByDesc(function ($col) {
            return $col->date_end_reg;
        })->values();

        return view('client.app.mobilities',
            ['contact' => array_chunk(Contact::all()->toArray(), Variables::NUMBER_OF_CONTACT_ROW),
                'office_hours' => Office_Hours::all(),
                'address' => Address::all(),
                'mobilities' => $sortedMobility,
            ]);
    }

    private function getTopMobilityType($typeID, $limit, $perPage)
    {
        $offset = Variables::TIME_OFFSET;
        $topMobility = Mobility::select('ID', 'mobility_types_ID', 'partner_university_ID', 'category_ID')
            ->with([
                'university' => function ($query) {
                    $query->select('ID', 'country_ID', 'name', 'img_url');
                }
                , 'category' => function ($query) use ($offset) {
                    $query->select('ID', 'name');
                }
                , 'season' => function ($query) use ($offset) {
                    $query->select('ID', 'mobility_ID', 'date_end_reg')->where('date_end_reg', '>', Carbon::now($offset));
                }
                , 'university.country' => function ($query) {
                    $query->select('ID', 'name');
                }
                , 'review' => function ($query) {
                    $query->select('rating');
                }
            ])
            ->withCount('review')
            ->whereHas('season', function ($query) use ($offset) {
                $query->where('season.date_end_reg', '>', Carbon::now($offset));
            })
            ->where('mobility_types_ID', '=', $typeID)
            ->has('university')->has('university.country')
            ->when($limit, function ($query, $limit) {
                $query->take($limit);
            })
            ->skip(0)
            ->take($perPage)
            ->get();

        return $topMobility;
    }
}