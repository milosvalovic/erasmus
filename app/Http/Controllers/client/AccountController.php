<?php

namespace App\Http\Controllers\client;


use Illuminate\Routing\Controller;

class AccountController extends Controller
{
    public function login(){
        return view('client.app.account', ['view' => 'login']);
    }

    public function register(){
        return view('client.app.account', ['view' => 'register']);
    }

    public function forget_password(){
        return view('client.app.account', ['view' => 'forget_password']);
    }
}