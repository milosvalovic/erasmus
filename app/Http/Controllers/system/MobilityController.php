<?php

namespace App\Http\Controllers\system;


use App\Models\Category;
use App\Models\Mobility_Type;
use App\Models\University;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Mobility;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MobilityController extends Controller
{
    public function mobilities()
    {
        DB::enableQueryLog();
        $allMobilities = Mobility::has('mobility_type')->has('category')->has('university')->has('country')->paginate(15);

        $categories = Category::all();
        $types = Mobility_Type::all();
        $universities = University::has('country')->get();

//        $query = DB::getQueryLog();
//        print_r($query);
//        die;
        return view('system.mobility_admin',['mobilities' => $allMobilities, 'categories' => $categories, 'types' => $types, 'universities' => $universities]);
    }

    public function mobilityEditShow($id)
    {
        $mobility = Mobility::find($id);
        $categories = Category::all();
        $types = Mobility_Type::all();
        $universities = University::has('country')->get();
        return view('system.edit.mobility_edit', ['mobility' => $mobility, 'categories' => $categories, 'types' => $types, 'universities' => $universities]);
    }

    public function addMobility(Request $request){
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        $mobility = new Mobility();
        $mobility->mobility_types_ID = $request->input('type_ID');
        $mobility->category_ID = $request->input('category_ID');
        $mobility->partner_university_ID = $request->input('university_ID');
        $mobility->grant = $request->input('grant');
        $mobility->info = $request->input('info');
        $mobility->save();

        return redirect('/admin/mobilities');
    }

    public function editMobility(Request $request){
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        $mobility = Mobility::find($request->input('id'));
        $mobility->mobility_types_ID = $request->input('type_ID');
        $mobility->category_ID = $request->input('category_ID');
        $mobility->partner_university_ID = $request->input('university_ID');
        $mobility->grant = $request->input('grant');
        $mobility->info = $request->input('info');
        $mobility->save();
        return redirect('/admin/mobilities');
    }

    public function deleteMobility($id){
        Mobility::find($id)->delete();
        return redirect('/admin/mobilities');
    }


    public function validateCreate($request){
        $validator = Validator::make($request->all(), [
            'university_ID' => 'required',
            'category_ID' => 'required',
            'type_ID' => 'required',
            'grant' => 'required',
            'info' => 'required|string'
        ]);

        return $validator;
    }

}