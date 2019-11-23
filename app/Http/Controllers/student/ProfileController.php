<?php

namespace App\Http\Controllers\student;

use App\Http\Variables;
use Illuminate\Routing\Controller;
use App\Models\User_Season;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function mobilities()
    {
        return view('system.student.mobility', ['mobilities' => $this->getMobility(), 'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]);
    }

    public function signups()
    {
        return view('system.student.signups', ['reistrations' => $this->getReistrations(),'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]);
    }

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

    public function getReistrations(){
        if(Auth::check()) {
            $userID = Auth::user()->id;

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