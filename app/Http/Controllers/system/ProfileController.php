<?php

namespace App\Http\Controllers\system;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function my_profile()
    {
        return view('system.detail.my_detail');
    }

    public function newsletterChange($state)
    {
        $user = User::find(Auth::user()->ID);
        $user->newsletter = $state;
        $user->save();
    }

    public function changePassword(Request $request)
    {
        $actual_password = $request->input('actual_password');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');

        if (!Hash::check($actual_password, Auth::user()->password)) {
            Session::flash('error', 'Pôvodné heslo sa nezhoduje s heslom, čo ste zadali.');
            return redirect()->back()->withInput();
        }


        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        $user = User::find(Auth::user()->ID);
        $user->password = Hash::make($password);
        $user->save();
        return redirect()->back();
    }

}