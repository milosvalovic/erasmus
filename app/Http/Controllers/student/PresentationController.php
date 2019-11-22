<?php

namespace App\Http\Controllers\student;

use App\Http\Variables;
use App\Models\Presentation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PresentationController extends Controller
{
    public function newPresentation()
    {
        return view('system.student.presentation');
    }

    public function insertPresentation(Request $request)
    {
        Validator::make($request->all(), [
            'file' => 'required|max:8000|mimes:pptx,pptm,ppt,pdf',
            'users_season_ID' => 'required|numeric',
        ])->validate();

        $file = $request->file('file');

        $presentation = new Presentation();
        $presentation->users_season_ID = $request->input('users_season_ID');
        $presentation->file_url = Variables::PRESENTATIONS_SAVE_PATH . '/' . $file->getClientOriginalName();

        $file->move(Variables::PRESENTATIONS_SAVE_PATH, $file->getClientOriginalName());

        if ($presentation->save()) {
            Session::flash('success', Lang::get('app.presentation_success_messeage'));
            return redirect('/profil/mobility');
        } else {
            Session::flash('error', Lang::get('app.presentation_fail_messeage'));
            return redirect('/profil/mobility');
        }
    }
}