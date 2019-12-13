<?php

namespace App\Http\Controllers\system;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Office_Hours;


class OfficeHourController extends Controller
{
    public function __construct()
    {

    }

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

    public function editHours(Request $request)
    {
        $hours = Office_Hours::find($request->input('ID'));
        $hours->day = $request->input('day');
        $hours->from = $request->input('from');
        $hours->to = $request->input('to');
        if ($request->input('off') == null)
            $hours->off = 1;
        else
            $hours->off = 0;
        $hours->save();

        return redirect('/admin/open_hours');
    }


}