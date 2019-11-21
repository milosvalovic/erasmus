<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class CategoryMobilityController extends Controller
{
    public function mobility_category()
    {
        return view('system.mobility_category_admin');
    }

}