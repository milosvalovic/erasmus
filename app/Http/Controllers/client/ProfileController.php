<?php

namespace App\Http\Controllers\client;

use Illuminate\Routing\Controller;
use App\Models\User_Season;
use App\Http\Variables;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //Ziskat vsetky mobility na ktorych bol prihlaseny pouzivatel
    public function getMobility(){

        if(Auth::check()){
            $userID = Auth::user()->id;

            $mobility = User_Season::select('ID','users_ID','season_ID')
                ->with([
                    'season' => function ($query) {
                    $query->select('ID','date_start_mobility','date_end_mobility','mobility_ID');
                    },
                    'season.mobility' => function ($query) {
                        $query->select('ID','info');
                    },
                    'status_season' => function ($query) {
                        $query->select('ID','users_season_ID','season_status_ID')->orderBy('ID','DESC')->first();
                    }
                ])
                ->whereHas('status_season', function($query){
                    $query->where('status_season.season_status_ID','=',Variables::SEASON_STATUS_DONE);
                })
                ->where('users_ID','=',$userID)
                ->get();

            return $mobility;

        }else{
            return 'error:user_login';
        }
    }

    //Ziskat vsetky prihlasky
    public function getReistrations(){
        if(1) {
            $userID = 1;//Auth::user()->id;

            $registrations = User_Season::select('ID','users_ID','season_ID')
                ->with([
                    'season' => function ($query) {
                        $query->select('ID','date_start_mobility','date_end_mobility','mobility_ID');
                    },
                    'season.mobility' => function ($query) {
                        $query->select('ID','info');
                    },
                    'status_season' => function ($query) {
                        $query->select('ID','users_season_ID','season_status_ID')->orderBy('ID','DESC')->first();
                    },
                    'status_season.season_status' => function ($query) {
                        $query->select('ID','name');
                    }
                ])
                ->whereHas('status_season', function($query){
                    $query->where('status_season.season_status_ID','!=',Variables::SEASON_STATUS_DONE);
                })
                ->where('users_ID','=',$userID)
                ->get();


            return $registrations;
        }else{
            return 'error:user_login';
        }
    }
}
