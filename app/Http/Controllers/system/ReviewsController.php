<?php

namespace App\Http\Controllers\system;


use App\Models\Review;
use App\Models\Images;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function reviews()
    {
        $reviews = Review::has('user_season.user')->paginate(15);

        return view('system.reviews_admin', ['reviews' => $reviews]);
    }

    public function reviewEditShow($id)
    {
        if (Auth::user()->roles->id == 3)
            $images = Images::where('reviews_ID','=',$id)->withTrashed()->get();
        else
            $images = Images::where('reviews_ID',$id)->get();
        $review = Review::with('user_season')->with('user_season.user')->find($id);

        return view('system.edit.review_edit', ['images' => $images, 'review' => $review]);
    }

    public function deleteReview($id)
    {
        $review = Review::find($id);
    }

    public function deleteImage($id)
    {
        $image = Images::find($id);
        /*$fullImage = $image->url;
        $thumbImage = $image->thumb_url;

        if (file_exists($fullImage)) {
            unlink($fullImage);
        }
        if (file_exists($thumbImage)) {
            unlink($thumbImage);
        }*/
        $image->delete();

        return ['result' => true];
    }

    public function revertImage($id){
        $image = Images::withTrashed()->find($id);
        $image->restore();

        return ['result' => true];
    }


}