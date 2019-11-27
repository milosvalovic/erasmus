<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;
use App\Models\Mobility_Type;

class TypeMobilityController extends Controller
{
    public function mobility_type()
    {
        $mobilityTypes = Mobility_Type::all();
        return view('system.mobility_type_admin',['mobility_types' => $mobilityTypes]);
    }

}