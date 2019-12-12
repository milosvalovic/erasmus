<?php

namespace App\Http\Controllers\system;



use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\FAQ;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function faq()
    {
        $faqData = FAQ::orderBy('ID', 'ASC')->paginate(15);
        return view('system.faq_admin', ['faqData' => $faqData]);
    }

    public function addFaq(Request $request){
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        $faq = new FAQ();
        $faq->name = $request->input('name');
        $faq->description = $request->input('description');
        $faq->save();

        return redirect('/admin/faq/');
    }

    public function editFaq(Request $request){
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        $faq = FAQ::find($request->input('id'));
        $faq->name = $request->input('name');
        $faq->description = $request->input('description');
        $faq->save();

        return redirect('/admin/faq/');
    }

    public function deleteFaq($id){
        FAQ::find($id)->delete();
        return redirect('/admin/faq/');
    }
    public function faqEditShow($id)
    {
        $faqData = FAQ::find($id);
        return view('system.edit.faq_edit', ['faqData' => $faqData]);
    }

    public function validateCreate($request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        return $validator;
    }

}