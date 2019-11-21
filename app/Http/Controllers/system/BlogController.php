<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    public function blogs_view()
    {
        return view('system.blogs_admin');
    }

}