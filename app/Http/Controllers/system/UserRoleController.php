<?php

namespace App\Http\Controllers\system;


use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller
{
    public function roles()
    {
        $roles = Role::paginate(15);
        return view('system.users_role_admin')->with('roles',$roles);
    }

    public function addRole(Request $request){

        $validator= $this->validate($request);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }

        $role = new Role();
        $role->name = $request->input("name");
        $role->description = $request->input('description');
        $role->save();

        return redirect(url('/admin/roles'));
    }

    public function editRole(Request $request){
        $role = Role::find($request->input('id'));
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();
        return redirect(url('/admin/roles'));
    }

    public function deleteRole($id){
        $role = Role::find($id);
        $role->delete();

        return redirect(url('/admin/roles'));

    }
    public function validate($request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:roles'
        ]);

        return $validator;
    }

    public function userRoleEditShow($id)
    {
        $role = Role::find($id);
        return view("system.edit.user_role_edit", ['role' => $role]);
    }









}