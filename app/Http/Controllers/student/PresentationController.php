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
    public function newPresentation($users_season_ID)
    {
        return view('system.student.presentation', ['inputs'=> array('users_season_ID' =>$users_season_ID)]);
    }

    public function insertPresentation(Request $request)
    {
        Validator::make($request->all(), [
            'file' => 'required|max:8000|mimes:pptx,pptm,ppt,pdf',
            'users_season_ID' => 'required|numeric',
        ])->validate();

        $file = $request->file('file');
        $file_name = now()->format('YmdHisu') . '.' . $file->getClientOriginalExtension();
        $presentation = new Presentation();
        $presentation->users_season_ID = $request->input('users_season_ID');
        $presentation->file_url = Variables::PRESENTATIONS_SAVE_PATH  . $file_name;

        $file->move(Variables::PRESENTATIONS_SAVE_PATH, $file_name);

        if ($presentation->save()) {
            Session::flash('success', Lang::get('app.presentation_success_messeage'));
            return redirect('/profil/mobility');
        } else {
            Session::flash('error', Lang::get('app.presentation_fail_messeage'));
            return redirect('/profil/mobility');
        }
    }
}