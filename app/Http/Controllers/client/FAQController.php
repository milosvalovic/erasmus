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
        $views = array('client.app.layout.faq.questions.basic_information',
                       'client.app.layout.faq.questions.partner_universities',
                       'client.app.layout.faq.questions.conditions',
                       'client.app.layout.faq.questions.amount',
                       'client.app.layout.faq.questions.before_leaving',
                       'client.app.layout.faq.questions.returns');

        for ($i = 0; $i < sizeof($faqs); $i++ ){
            if($faqs[$i]->name == "Partnerské Univerzity"){
                $faqs[$i]->description = University::all();
            }
            $faqs[$i]->layout = $views[$i];
        }

        return view('client.app.faq', ['faqs' => $faqs]);
    }
}