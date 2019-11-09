<?php

namespace App\Http\Controllers\client;


use App\Models\FAQ;
use App\Models\University;
use Illuminate\Routing\Controller;

class FAQController extends Controller
{
    public function faq()
    {
        return view('client.app.faq', ['faq' => FAQ::all(), 'university' => University::all()]);
    }
}