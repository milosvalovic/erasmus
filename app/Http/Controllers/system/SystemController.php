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



    public function mobility_category()
    {
        return view('system.mobility_category_admin');
    }

    public function blogs_view()
    {
        return view('system.blogs_admin');
    }

    public function universities()
    {
        return view('system.universities_admin');
    }

    public function images()
    {
        return view('system.images_admin');
    }

    public function faq()
    {
        return view('system.faq_admin');
    }

    public function office_hours()
    {
        return view('system.office_hours_admin');
    }


}