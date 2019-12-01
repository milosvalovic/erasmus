<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;
use App\Models\Season;

class SeasonController extends Controller
{
    public function season()
    {
        $seasons = Season::all();
        return view('system.season_admin',['seasons' => $seasons]);
    }

    public function seasonEditShow()
    {
        return view();
    }

}