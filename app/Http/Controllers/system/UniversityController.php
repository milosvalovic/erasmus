<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class UniversityController extends Controller
{
    public function universities()
    {
        return view('system.universities_admin');
    }

}