<?php

namespace App\Http\Controllers\client;


use Illuminate\Routing\Controller;

class MobilitiesController extends Controller
{
    public function mobilities(){
        return view('client.app.mobilities');
    }
}