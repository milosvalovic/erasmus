<?php

namespace App\Http\Controllers\system;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Mobility_Type;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TypeMobilityController extends Controller
{
    public function mobility_type()
    {
        $mobilityTypes = Mobility_Type::paginate(15);
        return view('system.mobility_type_admin',['mobility_types' => $mobilityTypes]);
    }

    public function mobilityTypeShowEdit($id)
    {
        $mobilityType = Mobility_Type::find($id);
        return view ('system.edit.mobility_type_edit', ['mobility_type' => $mobilityType]);
    }

    public function addType(Request $request){
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        $mobilityType = new Mobility_Type();
        $mobilityType->name = $request->input('name');
        $mobilityType->save();

        return redirect('/admin/mobility_type');
    }

    public function editType(Request $request){
        $mobilityType = Mobility_Type::find($request->input('ID'));
        $mobilityType->name = $request->input('name');
        $mobilityType->save();

        return redirect('/admin/mobility_type');
    }

    public function deleteType($id){
        $mobilityType = Mobility_Type::find($id);
        $mobilityType->delete();
        return redirect('/admin/mobility_type');
    }

    public function validateCreate($request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:mobility_types'
        ]);

        return $validator;
    }

}