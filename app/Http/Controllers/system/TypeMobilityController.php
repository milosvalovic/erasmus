<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class TypeMobilityController extends Controller
{
    public function mobility_type()
    {
        return view('system.mobility_type_admin');
    }

}