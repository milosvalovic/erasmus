<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Models\Mobility;
use Illuminate\Routing\Controller;

class SearchController extends Controller
{
    //Vr�ti v�etky mobility pod�a vyh�ad�vania pou��vate�a
    public function searchMobility(Request $request){

            $countrySearch = $request->input('country');
            $universitySearch = $request->input('university');
            $typeSearch = $request->input('stays');
            $dateStartSearch = $request->input('from');
            $dateEndSearch = $request->input('to');
            $ratingSearch = $request->input('rating');

            $allMobility = Mobility::select('mobility.ID','mobility.mobility_types_ID','partner_university.img_url','countries.country_name','partner_university.name')
                ->selectRaw('(SELECT COUNT(comments.id) FROM comments WHERE comments.mobility_ID = mobility.ID) count')
                ->selectRaw('(SELECT AVG(rating) FROM comments WHERE comments.mobility_ID = mobility.ID) rating')
                ->selectRaw('min(season.date_end_reg)')
                ->leftJoin('partner_university', 'partner_university.ID', '=', 'mobility.partner_university_ID')
                ->leftJoin('countries', 'countries.ID', '=', 'partner_university.country_ID')
                ->leftJoin('season', 'mobility.ID', '=', 'season.mobility_ID')
                ->leftJoin('comments', 'comments.mobility_ID', '=', 'mobility.ID')
                ->whereRaw( 'curdate() < season.date_end_reg')
                ->when($countrySearch, function ($query, $countrySearch){
                    return $query->where('countries.country_name', 'like', '%'.$countrySearch.'%');
                })
                ->when($universitySearch, function ($query, $universitySearch){
                    return $query->where('partner_university.name', 'like', '%'.$universitySearch.'%')
                                 ->orWhere('partner_university.acronym', 'like', '%'.$universitySearch.'%' );
                })
                ->when($typeSearch, function ($query, $typeSearch){
                    return $query->where('mobility.mobility_types_ID', '=', $typeSearch);
                })
                ->when($dateStartSearch, function ($query, $dateStartSearch){
                    return $query->where('season.date_start_mobility', '<=', $dateStartSearch);
                })
                ->when($dateEndSearch, function ($query, $dateEndSearch){
                    return $query->where('season.date_end_mobility', '<=', $dateEndSearch);
                })
                ->when($ratingSearch, function ($query, $ratingSearch){
                    return $query->where('rating', '>=', $ratingSearch);
                })
                ->where('mobility.deleted_at','=',null)
                ->groupBy('mobility.ID')
                ->get();

            return $allMobility;
    }
}
