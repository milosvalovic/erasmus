<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class SystemController extends Controller
{
    public function system(){
        return view('system.welcome_admin');
    }

    public function users(){
        return view('system.user_admin');
    }

    public function roles(){
        return view('system.users_role_admin');
    }

    public function edit_user(){
        return view('system.edit_user_admin');
    }

    public function mobilities(){
        return view('system.mobility_admin');
    }

    public function mobility_category(){
        return view('system.mobility_category_admin');
    }

    public function blogs_view(){
        return view('system.blogs_admin');
    }

    public function universities(){
        return view ('system.universities_admin');
    }

    public function images(){
        return view ('system.images_admin');
    }



}