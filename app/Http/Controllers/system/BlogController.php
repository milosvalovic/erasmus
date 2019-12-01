<?php

namespace App\Http\Controllers\system;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web','auth']);
    }

    public function blog()
    {
        //var_dump(Auth::user());
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->hasRole("organizator")) {

            } else if ($user->hasRole("administrator")) {

            } else {
                Auth::logout();
                return redirect('/prihlasovanie');

            }
        } else {
            echo 'problem 2';
            Auth::logout();
            return redirect('/prihlasovanie');
        }
        $blogs = Blog::has('user')->has('user_2')->has('user_season')->paginate(15);
        return view('system.blogs_admin', ['blogs' => $blogs]);
    }

    public function blogEditShow($id)
    {
        $blog = Blog::find($id);
        return view('system.edit.blog_edit', ['blog' => $blog]);
    }

    public function changeBlogStatus(Request $request)
    {

        $adminID = Auth::user()->id;
        $blog = Blog::find($request->input('id'));
        $blog->confirm_by = $adminID;
        $status = $request->input('status');
        $blog->status = $status == null ? 0 : 1;
        $blog->save();

        return redirect('/admin/blogs');
    }

    public function deleteBlog($id){
        Blog::find($id)->delete();
        return redirect('/admin/blogs');

    }

}