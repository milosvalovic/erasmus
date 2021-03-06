<?php

namespace App\Http\Controllers\client;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Office_Hours;
use App\Models\Mobility;
use App\Models\University;
use App\Models\Mobility_Type;
use App\Models\Category;
use App\Http\Variables;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        return view('client.app.home',
            ['contact' => array_chunk(Contact::all()->toArray(), Variables::NUMBER_OF_CONTACT_ROW),
                'office_hours' => Office_Hours::all(), 'address' => Address::all(),
                'mobilities' => $this->getTopMobility(),
                'type' => Mobility_Type::pluck('name', 'id'),
                'category' => Category::pluck('name', 'id'),
                'mobility_in_row' => Variables::NUMBER_OF_MOBILITIES_IN_ROW,
                'skip_value' => Variables::NUMBER_OF_INITIAL_SKIP_VALUE,
                'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW
            ]);
    }

    private function getTopMobility()
    {
        $limit = Variables::HOME_PAGE_COUNT_MOBILITY;

        $types = $this->getTypesOfMobility();
        $topMobilityTypes = array();

        foreach ($types as $key => $type) {
            $mobility = $this->getTopMobilityType($type, $limit);

            if (count($mobility) > 0) {

                foreach ($mobility as $item) {
                    $item->review_avg = $item->review->avg('rating');
                }

                $sortedMobility = $mobility->sortByDesc(function ($col) {
                    return $col->review_avg;
                })->values();


                $topMobilityTypes[$key] = $sortedMobility;
            }
        }

        return $topMobilityTypes;
    }

    private function getTopMobilityType($typeID, $limit)
    {
        $offset = Variables::TIME_OFFSET;

        $topMobility = Mobility::select('ID', 'mobility_types_ID', 'partner_university_ID', 'category_ID')
            ->with([
                'university' => function ($query) {
                    $query->select('ID', 'country_ID', 'name', 'img_url', 'thumb_url');
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
            ->get();

        return $topMobility;
    }

    private function getTypesOfMobility()
    {
        $mobilityTypes = Mobility_Type::pluck('ID', 'name');

        return $mobilityTypes;
    }

    public function getCountryCodes()
    {
        $countries = University::with('country')->get()->pluck('country.country_code');

        return array('countries' => $countries);
    }
}