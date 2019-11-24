<?php

namespace App\Http\Controllers\system;


use App\Models\Images;
use Illuminate\Routing\Controller;

class ImageController extends Controller
{
    public function images()
    {
        $images = Images::get();
        return view('system.images_admin')->with(["images" => $images]);
    }

    public function deleteImage($id){
        $image = Images::find($id);
        $fullImage = $image->url;
        $thumbImage = $image->thumb_url;

        if(file_exists($fullImage)){
            @unlink($fullImage);
        }
        if(file_exists($thumbImage)){
            @unlink($thumbImage);
        }
        
        $image->delete();
        return back();
    }


}