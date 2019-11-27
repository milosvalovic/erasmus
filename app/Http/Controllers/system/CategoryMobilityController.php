<?php

namespace App\Http\Controllers\system;





use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class CategoryMobilityController extends Controller
{
    public function mobility_category()
    {
        $categories = Category::paginate(10);
        return view('system.mobility_category_admin',['mobilityCategories'=> $categories]);
    }


    public function addNewCategory(Request $request)
    {
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect("/admin/mobilities_category");

    }

    public function mobilityCategoryShow($id)
    {
        $category = Category::find($id);
        return view("system.edit.mobility_category_edit", ['category' => $category, 'id'=>$id]);
    }

    public function editCategory(Request $request){
        $category = Category::findOrFail($request->input('id'));
        $category->name = $request->input("name");

        //echo $category->name;

        $category->save();

        return redirect("/admin/mobilities_category");
    }

    public function validateCreate($request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        return $validator;
    }

    public function deleteCategory($id){
        $category = Category::where('id','=',$id);
        $category->delete();
        return redirect("/admin/mobilities_category");
    }


}