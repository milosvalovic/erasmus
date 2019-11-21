<?php

namespace App\Http\Controllers\system;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SystemUserController extends Controller
{
    public function system()
    {
        return view('system.welcome_admin');
    }

    public function users()
    {
        $users = User::select('*')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->get();
        return view('system.user_admin')->with('users', $users);
    }

    public function addUser(Request $request)
    {
        $user = User::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'newsletter' => 0,
            'verified' => 1,
            'password' => bcrypt($request->firstname),
        ]);

        $user->roles()
            ->attach(Role::where('name', $request->role)->first());
    }

    public function deleteUser($id)
    {
        User::where('id', '=', $id)->delete();
    }

    public function editUser(Request $request)
    {
        $user = User::find($request->id);
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->firstname);
        $user->save();

        $user->roles()->sync([$request->role]);
    }

}