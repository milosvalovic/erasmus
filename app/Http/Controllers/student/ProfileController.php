<?php

namespace App\Http\Controllers\student;

use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public function profil()
    {
        return view('system.student.profile');
    }

    public function presentation()
    {
        return view('system.student.presentation');
    }

    public function review()
    {
        return view('system.student.review');
    }

    public function blog()
    {
        return view('system.student.blog');
    }
}