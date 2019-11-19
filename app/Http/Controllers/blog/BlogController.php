<?php

namespace App\Http\Controllers\Blog;


use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    public function blog(){
        return view('client.blog.blog');
    }

    public function article(){
        return view('client.blog.article');
    }
}