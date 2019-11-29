<?php
/**
 * Created by PhpStorm.
 * User: Miloš
 * Date: 26. 11. 2019
 * Time: 10:35
 */

namespace App\Http\Controllers\system;


use App\Models\Country;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CountryController extends Controller
{
    public function countries(){
        $countries = Country::all();
        return view('system.countries_admin')->with(['countries' => $countries]);
    }

    public function addCountry(Request $request){

        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        $country = new Country();
        $country->name = $request->input("name");
        $country->country_code = $request->input("country_code");
        $country->erasmus_code = $request->input("erasmus_code");

        $country->save();
    }


    public function countryEditShow($id)
    {
        $country = Country::find($id);
        return view ('system.edit.country_edit',['country' => $country]);
    }

    public function editCountry(Request $request){
        $country = Country::find($request->input("id"));
        $country->update([
            "name" => $request->input("name"),
            "country_code" => $request->input("country_code"),
            "erasmus_code" => $request->input("erasmus_code")

        ]);
        return redirect()->back();
    }

    public function deleteCountry($id){
        Country::find($id)->delete();
        return redirect()->back();
    }

    public function validateCreate($request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:country',
            'country_code' => 'required|string|unique:country',
            'erasmus_code' => 'required|string|unique:country'
        ]);

        return $validator;
    }
}