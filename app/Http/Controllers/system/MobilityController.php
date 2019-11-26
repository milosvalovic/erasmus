<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class MobilityController extends Controller
{
    public function mobilities()
    {
        return view('system.mobility_admin');
    }

    public function add_mobility()
    {
        return view('system.add.add_mobility_category');
    }

}