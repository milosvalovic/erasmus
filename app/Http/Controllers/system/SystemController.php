<?php

namespace App\Http\Controllers\system;


use App\Models\Category;
use App\Models\Country;
use App\Models\Review;
use App\Models\University;
use App\Models\User;
use App\Models\User_season;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SystemController extends Controller
{
    public function system()
    {
        $userCount = User::count();
        $user_seasonCount = User_season::count();
        $university_count = University::count();
        $reviews_count = Review::count();

        return view('system.welcome_admin',['userCount' => $userCount, 'user_seasonCount' => $user_seasonCount, 'university_count' => $university_count, 'reviews_count' => $reviews_count]);
    }

    public function getTopUniversities()
    {
        $count = University::select('ID','name')
            ->withCount('user_season')
            ->orderBy('user_season_count','DESC')
            ->take('5')
            ->get();

        return $count;
    }

    public function getTopCategories()
    {
        $count = Category::select('ID','name')
            ->withCount('mobility')
            ->orderBy('mobility_count','DESC')
            ->take('5')
            ->get();

        return $count;
    }

    public function getTopCountries()
    {
        $count = Country::select('ID','name')
            ->withCount('user_season')
            ->orderBy('user_season_count','DESC')
            ->take('5')
            ->get();

        return $count;
    }

    public function charts(){
        $topCountries = Country::select('ID','name')
            ->withCount('user_season')
            ->orderBy('user_season_count','DESC')
            ->take('5')
            ->get();

        $topCategories = Category::select('ID','name')
            ->withCount('mobility')
            ->orderBy('mobility_count','DESC')
            ->take('5')
            ->get();

        $topUniveristies = University::select('ID','acronym')
            ->withCount('user_season')
            ->orderBy('user_season_count','DESC')
            ->take('5')
            ->get();

        return json_encode(['countries' => $topCountries->toArray(), 'categories' => $topCategories->toArray(), 'universities'=>$topUniveristies->toArray()]);

    }


    public function edit_user()
    {
        return view('system.edit_user_admin');
    }






}