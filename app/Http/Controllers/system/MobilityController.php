<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;
use App\Models\Mobility;

class MobilityController extends Controller
{
    public function mobilities()
    {
        $allMobilities = Mobility::all();
        return view('system.mobility_admin',['mobilities' => $allMobilities]);
    }

    public function mobilityEditShow($id)
    {
        $mobility = Mobility::find($id);
        return view('system.edit.mobility_edit', ['mobility' => $mobility]);
    }


}