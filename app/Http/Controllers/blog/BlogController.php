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

    public function insertArticle(Request $request){
        $request->validate([
            'title' => 'required|alpha|max:200',
            'article' => 'required',
            'date' => 'required|date',
        ]);

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->article = $request->input('article');
        $blog->publish_date = date("Y-m-d", strtotime($request->input('date')));
        $blog->users_ID = 1;
        $blog->users_season_ID = 1;
        $blog->save();

        return redirect('/profil');
    }
}