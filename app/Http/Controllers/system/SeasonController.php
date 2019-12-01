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

    public function newSeasonShow()
    {
        return view('system.add.season_add');
    }

    public function seasonEditShow($id)
    {
        $season = Season::find($id);
        return view('system.edit.season_edit', ['season' => $season]);
    }

}