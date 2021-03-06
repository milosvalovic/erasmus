<?php

namespace App\Http\Controllers\system;


use App\Exports\UniversitiesExport;
use App\Http\Variables;
use App\Models\Country;
use App\Models\University;



use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;


class UniversityController extends Controller
{
    public function universities()
    {
        /*$universities = University::select('*')
            ->join('countries', 'countries.ID', '=', 'partner_university.country_ID')->get();*/
        $universities = University::has('country')->paginate(15);
        $countries = Country::all();
        return view('system.universities_admin')->with(['universities' => $universities, 'countries' => $countries]);
    }

    public function addUniversity(Request $request)
    {
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        $file = $request->file("image");

        $filename = now()->format('YmdHisu') . '.' . $file->getClientOriginalExtension();

        $unversity = new University;
        $unversity->country_ID = $request->input('country_ID');
        $unversity->city = $request->input('city');
        $unversity->address = $request->input('address');
        $unversity->name = $request->input('name');
        $unversity->acronym = $request->input('acronym');
        $file->move(public_path() . Variables::UNIVERSITY_IMAGE_SAVE_PATH, $filename);
        $unversity->img_url = Variables::UNIVERSITY_IMAGE_SAVE_PATH . $filename;

        Image::make(public_path() . Variables::UNIVERSITY_IMAGE_SAVE_PATH . $filename)->resize(Variables::REVIEW_THUMB_WIDTH, Variables::REVIEW_THUMB_HEIGHT, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path() . Variables::UNIVERSITY_THUMB_SAVE_PATH . 'thumb-' . $filename, Variables::REVIEW_THUMB_QUALITY);
        $unversity->thumb_url = Variables::UNIVERSITY_THUMB_SAVE_PATH . 'thumb-' . $filename;

        if ($unversity->save()) {
            Session::flash('success', Lang::get('system.university_success_messeage'));
            return redirect('/admin/universities');
        } else {
            Session::flash('error', Lang::get('system.university_error_messeage'));
            return redirect('/admin/universities');
        }
    }


    public function validateCreate($request)
    {
        $validator = Validator::make($request->all(), [
            'country_ID' => 'required',
            'city' => 'required|string|max:45',
            'address' => 'required|string|max:100',
            'name' => 'required|string|max:100',
            'acronym' => 'required|string|max:10',
            'image' => 'bail|required|max:8000|mimes:jpeg,jpg,png,gif',
        ]);

        return $validator;
    }

    public function validateEdit($request)
    {
        $validator = Validator::make($request->all(), [
            'country_ID' => 'required',
            'city' => 'required|string|max:45',
            'address' => 'required|string|max:100',
            'name' => 'required|string|max:100',
            'acronym' => 'required|string|max:10'
        ]);

        return $validator;
    }

    public function editUniversity(Request $request)
    {
        $validation = $this->validateEdit($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        $file = $request->file('image');
        $university = University::find($request->input('ID'));
        $university->country_ID = $request->input('country_ID');
        $university->city = $request->input('city');
        $university->address = $request->input('address');
        $university->name = $request->input('name');
        $university->acronym = $request->input('acronym');
        if($file) {
            $url = $university->img_url;
            $urlThumb = $university->thumb_url;

            if($url) @unlink(public_path().$url);
            if($urlThumb) @unlink(public_path().$urlThumb);

            $filename = now()->format('YmdHisu') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . Variables::UNIVERSITY_IMAGE_SAVE_PATH, $filename);
            $university->img_url = Variables::UNIVERSITY_IMAGE_SAVE_PATH . $filename;

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
        $university->save();
        return redirect('/admin/universities');
    }

    public function deleteUniversity($id){
        $university = University::find($id);

        $url = $university->img_url;
        $urlThumb = $university->thumb_url;
        if($url) @unlink(public_path().$url);
        if($urlThumb) @unlink(public_path().$urlThumb);

        $university->delete();
        return redirect("/admin/universities");

    }

    public function universityEditShow($id)
    {
        $university = University::find($id);
        $countries = Country::all();
        return view("system.edit.university_edit", ['university' => $university, 'countries'=>$countries]);
    }

    public function exportUniversities(){
        return Excel::download(new UniversitiesExport(), 'Partnerské univerzity.xlsx');
    }


}