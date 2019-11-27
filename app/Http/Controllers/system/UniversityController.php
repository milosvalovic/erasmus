<?php

namespace App\Http\Controllers\system;


use App\Http\Variables;
use App\Models\University;
use Faker\Provider\Image;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UniversityController extends Controller
{
    public function universities()
    {
        $universities = University::select('*')
            ->join('countries', 'countries.ID', '=', 'partner_university.country_ID')->get();
        return view('system.universities_admin')->with(['universities' => $universities]);
    }

    public function addUniversity(Request $request)
    {
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        $file = $request->file('image');
        $filename = now()->format('YmdHisu') . '.' . $file->getClientOriginalExtension();

        $unversity = new University;
        $unversity->countryID = $request->input('country_ID');
        $unversity->city = $request->input('city');
        $unversity->address = $request->input('address');
        $unversity->name = $request->input('name');
        $unversity->acronym = $request->input('acronym');
        $file->move(public_path() . Variables::UNIVERSITY_IMAGE_SAVE_PATH, $filename);
        $unversity->url = Variables::UNIVERSITY_IMAGE_SAVE_PATH . $filename;

        Image::make(public_path() . Variables::UNIVERSITY_IMAGE_SAVE_PATH . $filename)->resize(Variables::REVIEW_THUMB_WIDTH, Variables::REVIEW_THUMB_HEIGHT, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path() . Variables::UNIVERSITY_THUMB_SAVE_PATH . 'thumb-' . $filename, Variables::REVIEW_THUMB_QUALITY);
        $unversity->thumb_url = Variables::UNIVERSITY_THUMB_SAVE_PATH . 'thumb-' . $filename;

        if ($unversity->save()) {
            Session::flash('success', Lang::get('app.university_success_messeage'));
            return redirect('/admin/university');
        } else {
            Session::flash('error', Lang::get('app.university_error_messeage'));
            return redirect('/admin/university');
        }
    }


    public function validateCreate($request)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required',
            'city' => 'required|string|max:45',
            'address' => 'required|string|max:100',
            'name' => 'required|string|unique:partner_university|max:100',
            'files.*' => 'bail|required|max:8000|mimes:jpeg,jpg,png,gif|dimensions:max_width=2000,max_height=1500|dimensions:min_width=1920,min_height=1080',


        ]);

        return $validator;
    }

    public function editUniversity(Request $request)
    {
        /*$validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }*/

        $file = $request->file('image');
        $filename = now()->format('YmdHisu') . '.' . $file->getClientOriginalExtension();
        $university = University::find($request->input('ID'));
        $university->countryID = $request->input('country_ID');
        $university->city = $request->input('city');
        $university->address = $request->input('address');
        $university->name = $request->input('name');
        $university->acronym = $request->input('acronym');
        if($file) {
            $file->move(public_path() . Variables::UNIVERSITY_IMAGE_SAVE_PATH, $filename);
            $university->url = Variables::UNIVERSITY_IMAGE_SAVE_PATH . $filename;

            Image::make(public_path() . Variables::UNIVERSITY_IMAGE_SAVE_PATH . $filename)->resize(Variables::REVIEW_THUMB_WIDTH, Variables::REVIEW_THUMB_HEIGHT, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path() . Variables::UNIVERSITY_THUMB_SAVE_PATH . 'thumb-' . $filename, Variables::REVIEW_THUMB_QUALITY);
            $university->thumb_url = Variables::UNIVERSITY_THUMB_SAVE_PATH . 'thumb-' . $filename;

            if ($university->save()) {
                Session::flash('success', Lang::get('app.university_success_messeage'));
                return redirect('/admin/universities');
            } else {
                Session::flash('error', Lang::get('app.university_error_messeage'));
                return redirect('/admin/universities');
            }
        }
    }

    public function deleteUniversity($id){
        $university = University::find($id);

        $url = $university->url;
        $urlThumb = $university->thumb_url;
        if($url) @unlink(public_path().$url);
        if($urlThumb) @unlink(public_path().$urlThumb);

        $university->delete();
        return redirect("/admin/universities");

    }

    public function universityEditShow($id)
    {
        $university = University::find($id);
        return view("system.edit.university_edit", ['university' => $university]);
    }


}