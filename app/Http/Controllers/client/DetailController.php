<?php

namespace App\Http\Controllers\client;

use App\Models\Mobility;
use App\Models\Review;
use App\Http\Variables;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class DetailController extends Controller
{
    public function detail(){
        return view('client.app.detail');
    }
    
}