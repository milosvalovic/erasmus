<?php

namespace App\Http\Controllers\system;


use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function system()
    {
        return view('system.welcome_admin');
    }

    public function users()
    {
        $users = User::has('roles')->paginate(15);
        $roles = Role::all();

        return view('system.user_admin')->with(['users'=> $users, 'roles'=>$roles]);
    }

    public function addUser(Request $request)
    {
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        /*$user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'roles_ID' => $request->input('role_id'),
            'newsletter' => 0,
            'verified' => 1,
            'password' => bcrypt($request->input('password')),
        ]);*/

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->roles_ID = $request->input('role_id');
        $user->newsletter = 0;
        $user->verified = 1;
        $user->password = bcrypt($request->input('password'));
        $user->save();


        Password::broker()->sendResetLink(['email'=>$user->email]);

        return redirect('/admin/users/');

    }

    public function deleteUser($id)
    {
        User::where('ID', '=', $id)->delete();
        return redirect('/admin/users/');
    }

    public function userEditShow($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view("system.edit.user_edit", ['user' => $user, 'roles'=>$roles]);
    }

    public function editUser(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->roles_ID = $request->input('role_id');
        $user->save();

        return redirect('/admin/users/');
    }

    public function validateCreate($request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'password' => 'required|string',
            'role_id' => 'required'
        ]);

        return $validator;
    }


}