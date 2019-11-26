<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;
use App\Models\Category;


class CategoryMobilityController extends Controller
{
    public function mobility_category()
    {
        $categories = Category::all();
        return view('system.mobility_category_admin',['mobilityCategories'=> $categories]);
    }


    public function addNewCategory()
    {
        /*   Add new category --BackEnd--
        .
        .
        .
         */

    }

    public function mobilityCategoryShow($id)
    {
        $category = Category::find($id);
        return view("system.edit.mobility_category_edit", ['category' => $category]);
    }

}