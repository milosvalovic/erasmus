<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Models\Mobility;
use Illuminate\Routing\Controller;
use App\Http\Variables;
use Carbon\Carbon;

class SearchController extends Controller
{
    //Vrati vsetky mobility podaa vyhladavania pouzivatela
    public function searchMobility(Request $request)
    {
            $offset = Variables::TIME_OFFSET;

            $countrySearch = $request->input('country');
            $universitySearch = $request->input('university');
            $typeSearch = $request->input('stays');
            $dateStartSearch = $request->input('from');
            $dateEndSearch = $request->input('to');
            $ratingSearch = $request->input('rating');


            $allMobility = Mobility::select('ID','mobility_types_ID','partner_university_ID')

                ->with([
                    'university' => function($query){
                        $query->select('ID','country_ID','name','img_url');
                    }
                    ,'season' => function($query) use ($offset){
                        $query->select('ID','mobility_ID','date_end_reg')->where('date_end_reg','>',Carbon::now($offset));
                    }
                    ,'university.country' => function($query){
                        $query->select('ID','name');
                    }
                    ,'review' => function($query){
                        $query->select('rating');
                    }
                    ])
                ->withCount('review')

                ->whereHas('season', function($query) use ($offset){
                    $query->where('season.date_end_reg','>',Carbon::now($offset));
                })

                ->has('university')
                ->has('university.country')

                ->when($countrySearch, function ($query) use ($countrySearch){
                    return $query->whereHas('university.country', function ($query) use ($countrySearch){
                      $query->where('name', 'like', '%'.$countrySearch.'%');
                    });
                })
                ->when($universitySearch, function ($query) use ($universitySearch){
                    return $query->whereHas('university', function ($query) use ($universitySearch){
                        $query->where('acronym', 'like', '%'.$universitySearch.'%')->orWhere('name','like','%'.$universitySearch.'%');
                    });
                })
                ->when($typeSearch, function ($query) use ($typeSearch){
                    return $query->whereHas('university', function ($query) use ($typeSearch){
                        $query->where('mobility_types_ID', '=', $typeSearch);
                    });
                })
                ->when($dateStartSearch, function ($query) use ($dateStartSearch){
                    return $query->whereHas('season', function ($query) use ($dateStartSearch){
                        $query->where('date_start_mobility', '<=', $dateStartSearch);
                    });
                })
                ->when($dateEndSearch, function ($query) use ($dateEndSearch){
                    return $query->whereHas('season', function ($query) use ($dateEndSearch){
                        $query->where('date_end_mobility', '<=', $dateEndSearch);
                    });
                })
               ->get();

                if($ratingSearch){
                    foreach ($allMobility as $mobility){
                        $mobility->review_avg = $mobility->review->avg('rating');
                    }

                    $allMobilityFiltered = $allMobility->where('review_avg','>=',$ratingSearch);
                }

                $sortedAllMobility = $allMobilityFiltered->sortByDesc(function($col) {
                    return $col->date_end_reg;
                })->values();

            return $sortedAllMobility;
    }
}
