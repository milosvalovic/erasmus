<?php

namespace App\Http\Controllers\student;

use App\Http\Variables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User_Season;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function mobilities()
    {
        return view('system.student.mobility', ['mobilities' => $this->getMobility(), 'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]);
    }

    public function signups()
    {
        return view('system.student.signups', ['registrations' => $this->getRegistrations(),'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]);
    }

        public function newPassword()
    {
        return view('system.student.password', ['article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]);
    }

    private function getMobility(){
        if(Auth::check()){
            $userID = Auth::user()->ID;

            $mobility = User_Season::select('ID','users_ID','season_ID')
                ->with([
                    'season' => function ($query) {
                        $query->select('ID','date_start_mobility','date_end_mobility','mobility_ID');
                    },
                    'season.mobility' => function ($query) {
                        $query->select('ID','info','partner_university_ID');
                    },
                    'season.mobility.university' => function ($query) {
                        $query->select('ID','country_ID','name', 'acronym');
                    },
                    'season.mobility.university.country' => function ($query) {
                        $query->select('ID','name');
                    },
                    'status_season' => function ($query) {
                        $query->select('ID','users_season_ID','season_status_ID')->orderBy('ID','DESC');
                    }
                ])
                ->whereHas('status_season', function($query){
                    $query->where('status_season.season_status_ID','=',Variables::SEASON_STATUS_DONE);
                })
                ->where('users_ID','=',$userID)
                ->get();

            $filterMobility = array();
            foreach ($mobility as $item) {
                $i = $item->season->mobility->university;
                $item->place_name = $i->acronym . ', ' . $i->country->name;

                if($item->status_season->first()->season_status_ID == Variables::SEASON_STATUS_DONE){
                    array_push($filterMobility,$item);
                }
            }
            return $filterMobility;
        }else{
            return 'error:user_login';
        }
    }

    private function getRegistrations(){
        if(Auth::check()) {
            $userID = Auth::user()->ID;

            $registrations = User_Season::select('ID','users_ID','season_ID')
                ->with([
                    'season' => function ($query) {
                        $query->select('ID','mobility_ID');
                    },
                    'season.mobility' => function ($query) {
                        $query->select('ID','partner_university_ID');
                    },
                    'season.mobility.university' => function ($query) {
                        $query->select('ID','country_ID','name');
                    },
                    'season.mobility.university.country' => function ($query) {
                        $query->select('ID','name');
                    },
                    'status_season' => function ($query) {
                        $query->select('ID','users_season_ID','season_status_ID')->orderBy('ID','DESC');
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
            $filterRegistrations = array();
            foreach ($registrations as $item) {
                if($item->status_season->first()->season_status_ID !== Variables::SEASON_STATUS_DONE){
                    array_push($filterRegistrations,$item);
                }
            }

            return $filterRegistrations;
        }else{
            return 'error:user_login';
        }
    }

    public function changePassword(Request $request)
    {
        $actual_password = $request->input('actual_password');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');

        if (!Hash::check($actual_password, Auth::user()->password)) {
            Session::flash('error-actual', Lang::get('app.profil_password_error'));
            return redirect()->back()->withInput();
        }

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            Session::flash('error-match', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        $user = User::find(Auth::user()->ID);
        $user->password = Hash::make($password);
        $user->save();

        Session::flash('success', Lang::get('app.profil_password_success'));
        return view('system.student.mobility', ['mobilities' => $this->getMobility(), 'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]);
    }
}