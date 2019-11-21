<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    public function blog()
    {
        return view('system.blogs_admin');
    }

}