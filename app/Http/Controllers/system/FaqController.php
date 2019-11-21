<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class FaqController extends Controller
{
    public function faq()
    {
        return view('system.faq_admin');
    }

}