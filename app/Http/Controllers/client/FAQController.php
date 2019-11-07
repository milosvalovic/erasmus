<?php

namespace App\Http\Controllers\client;


use Illuminate\Routing\Controller;

class FAQController extends Controller
{
    public function faq(){
        return view('client.app.faq');
    }
}