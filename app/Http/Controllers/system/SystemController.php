<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class SystemController extends Controller
{
    public function system(){
        return view('system.index');
    }

}