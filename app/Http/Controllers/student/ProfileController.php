<?php

namespace App\Http\Controllers\student;

use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public function mobilities()
    {
        return view('system.student.mobility');
    }

    public function signups()
    {
        return view('system.student.signups');
    }
}