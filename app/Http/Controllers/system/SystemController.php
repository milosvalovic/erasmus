<?php

namespace App\Http\Controllers\system;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SystemController extends Controller
{
    public function system()
    {
        return view('system.welcome_admin');
    }


    public function edit_user()
    {
        return view('system.edit_user_admin');
    }






}