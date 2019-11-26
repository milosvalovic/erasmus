<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class MobilityController extends Controller
{
    public function mobilities()
    {
        return view('system.mobility_admin');
    }


}