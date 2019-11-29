<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;
use App\Models\FAQ;

class FaqController extends Controller
{
    public function faq()
    {
        $faqData = FAQ::all();
        return view('system.faq_admin', ['faqData' => $faqData]);
    }

    public function faqEditShow($id)
    {
        $faqData = FAQ::find($id);
        return view('system.edit.faq_edit', ['faqData' => $faqData]);
    }

}