<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class OfficeHourController extends Controller
{

    public function office_hours()
    {
        return view('system.office_hours_admin');
    }

}