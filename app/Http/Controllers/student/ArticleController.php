<?php

namespace App\Http\Controllers\student;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function newArticle($users_ID, $users_season_ID)
    {
        return view('system.student.blog', ['inputs'=> array('users_ID' => $users_ID, 'users_season_ID' =>$users_season_ID)]);
    }

    public function insertArticle(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|alpha|max:200',
            'article' => 'required',
            'date' => 'required|date',
            'users_ID' => 'required|numeric',
            'users_season_ID' => 'required|numeric',
        ])->validate();

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->article = $request->input('article');
        $blog->publish_date = date("Y-m-d", strtotime($request->input('date')));
        $blog->users_ID = $request->input('users_ID');
        $blog->users_season_ID = $request->input('users_season_ID');

        if ($blog->save()) {
            Session::flash('success', Lang::get('app.article_success_messeage'));
            return redirect('/profil/mobility');
        } else {
            Session::flash('error', Lang::get('app.article_fail_messeage'));
            return redirect('/profil/mobility');
        }
    }
}