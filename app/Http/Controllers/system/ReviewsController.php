<?php

namespace App\Http\Controllers\system;


use App\Models\Review;
use App\Models\Images;
use Illuminate\Routing\Controller;

class ReviewsController extends Controller
{
    public function reviews()
    {
        $reviews = Review::all();
        return view('system.reviews_admin', ['reviews' => $reviews]);
    }

    public function reviewEditShow($id)
    {
        $review = Review::with('images')->find($id);
//        var_dump($review->toJson());

        return view('system.edit.review_edit', ['review' => $review]);
    }

    public function deleteReview($id){
        $review = Review::find($id);
    }


}