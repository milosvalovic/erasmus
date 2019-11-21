<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;

class UserRoleController extends Controller
{
    public function roles()
    {
        return view('system.users_role_admin');
    }

}