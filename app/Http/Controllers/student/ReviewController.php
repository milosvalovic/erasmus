<?php

namespace App\Http\Controllers\student;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function newReview()
    {
        return view('system.student.presentation');
    }

    public function insertReview(Request $request)
    {
        Validator::make($request->all(), [
            'users_season_ID' => 'required|max:8000|mimes:pptx,pptm,ppt,pdf',
            'review' => 'required|max:8000|mimes:pptx,pptm,ppt,pdf',
            'rating' => 'required|max:8000|mimes:pptx,pptm,ppt,pdf',
            'file' => 'required|max:8000|mimes:pptx,pptm,ppt,pdf',
        ])->validate();

        $file = $request->file('file');
        $destinationPath = 'uploads/presentations';

        $presentation = new Review();
        $presentation->users_season_ID = $request->input('users_season_ID');
        $presentation->review = $request->input('review');
        $presentation->rating = $request->input('rating');

        if($presentation->save()){
            if ($presentation->save()) {
                $file->move($destinationPath, $file->getClientOriginalName());
                Session::flash('success', Lang::get('app.review_success_messeage'));
                return redirect('/profil');
            } else {
                Session::flash('error', Lang::get('app.review_fail_messeage'));
                return redirect('/profil');
            }
        }else{
            Session::flash('error', Lang::get('app.review_fail_messeage'));
            return redirect('/profil');
        }
    }
}







//
//    public function index() {
//        return view('system.student.review');
//    }
//    public function showUploadFile(Request $request) {
//
//        if($files=$request->file('files')){
//            foreach($files as $file){
//
//                //Display File Name
//                echo 'File Name: '.$file->getClientOriginalName();
//                echo '<br>';
//
//                //Display File Extension
//                echo 'File Extension: '.$file->getClientOriginalExtension();
//                echo '<br>';
//
//                //Display File Real Path
//                echo 'File Real Path: '.$file->getRealPath();
//                echo '<br>';
//
//                //Display File Size
//                echo 'File Size: '.$file->getSize();
//                echo '<br>';
//
//                //Display File Mime Type
//                echo 'File Mime Type: '.$file->getMimeType();
//
//                //Move Uploaded File
//                $destinationPath = 'uploads';
//                $file->move($destinationPath,$file->getClientOriginalName());
//            }
//        }
//
//
//        $file = $request->file('file');
//
//
//    }
//}