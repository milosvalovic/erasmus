<?php

namespace App\Http\Controllers\system;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
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
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

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
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $user->roles()->sync([$request->role]);
    }

    public function validateCreate($request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'password' => 'required|string|'
        ]);

        return $validator;
    }

    public function validateUpdate($request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
        ]);

        return $validator;
    }


}