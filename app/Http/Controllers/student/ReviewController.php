<?php

namespace App\Http\Controllers\student;

use App\Http\Variables;
use App\Models\Images;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ReviewController extends Controller
{
    public function newReview()
    {
        return view('system.student.review');
    }

    public function insertReview(Request $request)
    {
        Validator::make($request->all(), [
            'users_season_ID' => 'required|numeric',
            'review' => 'required',
            'rating' => 'required|numeric',
            'files.*' => 'bail|required|max:8000|mimes:jpeg,jpg,png,gif|dimensions:max_width=2000,max_height=1500|dimensions:min_width=1920,min_height=1080',
        ])->validate();

        $files = $request->file('files');

        $review = new Review();
        $review->users_season_ID = $request->input('users_season_ID');
        $review->review = $request->input('review');
        $review->rating = $request->input('rating');

        if ($review->save()) {
            foreach ($files as $file) {
                $images = new Images();
                $images->reviews_ID = $review->id;

                $name = now()->format('YmdHisu') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . Variables::REVIEW_IMAGE_SAVE_PATH, $name);
                $images->url = Variables::REVIEW_IMAGE_SAVE_PATH . $name;

                Image::make(public_path() . Variables::REVIEW_IMAGE_SAVE_PATH . $name)->resize(Variables::REVIEW_THUMB_WIDTH, Variables::REVIEW_THUMB_HEIGHT, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path() . Variables::REVIEW_THUMB_IMAGE_SAVE_PATH . 'thumb-' . $name, Variables::REVIEW_THUMB_QUALITY);
                $images->thumb_url = Variables::REVIEW_THUMB_IMAGE_SAVE_PATH . 'thumb-' . $name;
                $images->save();
            }
            Session::flash('success', Lang::get('app.review_success_messeage'));
            return redirect('/profil/mobility');
        } else {
            Session::flash('error', Lang::get('app.review_fail_messeage'));
            return redirect('/profil/mobility');
        }
    }
}