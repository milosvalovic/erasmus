<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;
use App\Models\Office_Hours;

class OfficeHourController extends Controller
{

    public function office_hours()
    {
        $officeHours = Office_Hours::all();
        return view('system.office_hours_admin', ['office_hours' => $officeHours]);
    }

    public function office_hourEditShow($id)
    {
        $officeHour = Office_Hours::find($id);
        return view('system.edit.office_hours_edit', ['item' => $officeHour]);
    }


}