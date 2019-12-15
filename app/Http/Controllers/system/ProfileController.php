<?php

namespace App\Http\Controllers\system;



use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function my_profile()
    {
        return view('system.detail.my_detail');
    }

}