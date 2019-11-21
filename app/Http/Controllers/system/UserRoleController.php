<?php

namespace App\Http\Controllers\system;


use App\Models\Role;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Validator;

class UserRoleController extends Controller
{
    public function roles()
    {
        $roles = Role::all();
        return view('system.users_role_admin')->with('roles',$roles);
    }

    public function addRole(Request $request){

        $validator= $this->validate($request);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        Role::create([
            'name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'newsletter' => 0,
            'verified' => 1,
            'password' => bcrypt($request->firstname),
        ]);

        redirect(url('/admin/role'));
    }

    public function editRole(Request $request){
        $role = Role::find($request->id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        redirect(url('/admin/role'));
    }

    public function deleteRole($id){
        $role = Role::find($id);
        $role->delete();

        redirect(url('/admin/role'));

    }
    public function validate($request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:roles',
            'description' => 'required|string'
        ]);

        return $validator;
    }

}