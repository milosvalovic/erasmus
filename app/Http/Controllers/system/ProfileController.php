<?php

namespace App\Http\Controllers\system;



use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function my_profile()
    {
        return view('system.detail.my_detail');
    }

    public function newsletterChange($state){
        $user = User::find(Auth::user()->ID);
        $user->newsletter = $state;
        $user->save();
    }

}