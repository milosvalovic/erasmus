<?php

namespace App\Http\Controllers\client;

use Illuminate\Routing\Controller;

class DetailController extends Controller
{
    public function detail()
    {
        return view('client.app.detail');
    }

}