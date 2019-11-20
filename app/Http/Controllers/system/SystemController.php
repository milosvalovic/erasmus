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

    public function edit_user(){
        return view('system.edit_user_admin');
    }

    public function mobilities(){
        return view('system.mobility_admin');
    }

}