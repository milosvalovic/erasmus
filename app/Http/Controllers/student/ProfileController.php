<?php

namespace App\Http\Controllers\student;

use App\Http\Variables;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public function mobilities()
    {
        return view('system.student.mobility', ['article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]);
    }

    public function signups()
    {
        return view('system.student.signups');
    }
}