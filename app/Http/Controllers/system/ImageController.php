<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class ImageController extends Controller
{
    public function images()
    {
        return view('system.images_admin');
    }

}