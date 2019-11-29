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
        $users = User::has('roles')->paginate(15);

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
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'email' => $request->input('email'),
            'newsletter' => 0,
            'verified' => 1,
            'password' => bcrypt($request->input('password')),
        ]);

        $user->roles()
            ->attach(Role::where('name', $request->input('role'))->first());
    }

    public function deleteUser($id)
    {
        User::where('id', '=', $id)->delete();
        return redirect('/admin/users/');
    }

    public function editUser(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->save();

        $user->roles()->sync($request->input('role_ID'));
    }

    public function validateCreate($request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'password' => 'required|string'
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