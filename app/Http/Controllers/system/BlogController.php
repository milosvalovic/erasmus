<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blog()
    {
        $blogs = Blog::all();
        return view('system.blogs_admin', ['blogs' => $blogs]);
    }

    public function blogEditShow($id)
    {
        $blog = Blog::find($id);
        return view('system.edit.blog_edit', ['blog' => $blog]);
    }

}