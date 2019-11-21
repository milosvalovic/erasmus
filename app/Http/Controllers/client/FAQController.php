<?php

namespace App\Http\Controllers\client;

use App\Models\FAQ;
use App\Models\University;
use Illuminate\Routing\Controller;

class FAQController extends Controller
{
    public function faq()
    {
        $faqs = FAQ::all();
        for ($i = 0; $i < sizeof($faqs); $i++) {
            if ($faqs[$i]->name == "Partnerské Univerzity") {
                $faqs[$i]->description = University::all();
            }
        }

        return view('client.app.faq', ['faqs' => $faqs]);
    }
}