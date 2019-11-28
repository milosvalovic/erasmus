<?php

namespace App\Http\Controllers\client;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Mobility_Type;
use App\Models\Office_Hours;
use App\Models\Country;
use App\Models\University;
use Illuminate\Http\Request;
use App\Models\Mobility;
use Illuminate\Routing\Controller;
use App\Http\Variables;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $offset = Variables::TIME_OFFSET;

        $countrySearch = $request->input('country');
        $universitySearch = $request->input('university');
        $typeSearch = $request->input('stays');
        $dateStartSearch = ($request->input('from') == '') ? '' : date("Y-m-d", strtotime($request->input('from')));
        $dateEndSearch = ($request->input('to') == '') ? '' : date("Y-m-d", strtotime($request->input('to')));
        $ratingSearch = $request->input('rating');

        $number_of_items = $request->input('number');

        $allMobility = Mobility::select('ID', 'mobility_types_ID', 'partner_university_ID', 'category_ID')
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
            ->has('university')
            ->has('university.country')
            ->when($countrySearch, function ($query) use ($countrySearch) {
                return $query->whereHas('university.country', function ($query) use ($countrySearch) {
                    $query->where('name', 'like', '%' . $countrySearch . '%');
                });
            })
            ->when($universitySearch, function ($query) use ($universitySearch) {
                return $query->whereHas('university', function ($query) use ($universitySearch) {
                    $query->where('acronym', 'like', '%' . $universitySearch . '%')->orWhere('name', 'like', '%' . $universitySearch . '%');
                });
            })
            ->when($typeSearch, function ($query) use ($typeSearch) {
                return $query->whereHas('university', function ($query) use ($typeSearch) {
                    $query->where('mobility_types_ID', '=', $typeSearch);
                });
            })
            ->when($dateStartSearch, function ($query) use ($dateStartSearch) {
                return $query->whereHas('season', function ($query) use ($dateStartSearch) {
                    $query->where('date_start_mobility', '<=', $dateStartSearch);
                });
            })
            ->when($dateEndSearch, function ($query) use ($dateEndSearch) {
                return $query->whereHas('season', function ($query) use ($dateEndSearch) {
                    $query->where('date_end_mobility', '<=', $dateEndSearch);
                });
            })
            ->skip(0)
            ->take(isset($number_of_items) ? (Variables::NUMBER_OF_MOBILITY_ITEMS + $number_of_items) : Variables::NUMBER_OF_MOBILITY_ITEMS)
            ->get();

        if ($ratingSearch) {
            foreach ($allMobility as $mobility) {
                $mobility->review_avg = $mobility->review->avg('rating');
            }

            $allMobilityFiltered = $allMobility->where('review_avg', '>=', $ratingSearch);

            $sortedAllMobility = $allMobilityFiltered->sortByDesc(function ($col) {
                return $col->date_end_reg;
            })->values();
        } else {
            $sortedAllMobility = $allMobility->sortByDesc(function ($col) {
                return $col->date_end_reg;
            })->values();
        }
        $sortedAllMobility = array_chunk($sortedAllMobility->toArray(), Variables::NUMBER_OF_MOBILITIES_IN_ROW);

        return view('client.app.search',
            ['contact' => array_chunk(Contact::all()->toArray(), Variables::NUMBER_OF_CONTACT_ROW),
                'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW,
                'office_hours' => Office_Hours::all(),
                'address' => Address::all(),
                'mobilities' => $sortedAllMobility,
                'size' => count($sortedAllMobility),
                'type' => Mobility_Type::pluck('name', 'id'),
                'last_search_criteria' => array(
                    "country" => $countrySearch,
                    "university" => $universitySearch,
                    "stays" => $typeSearch,
                    "from" => ($dateStartSearch == '') ? '' : date("d.m.Y", strtotime($dateStartSearch)),
                    "to" => ($dateEndSearch == '') ? '' : date("d.m.Y", strtotime($dateEndSearch)),
                    "rating" => $ratingSearch,
                )
            ]);
    }

    public function getAutocompleteCountries($value)
    {
        $countries = Country::where('name','LIKE','%'.$value.'%')->pluck('ID','name');

        return $countries;
    }

    public function getAutocompleteUniversity($value)
    {
        $university = University::where('name','LIKE','%'.$value.'%')->pluck('ID','name');

        return $university;
    }
}