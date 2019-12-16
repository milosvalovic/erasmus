<?php

namespace App\Http\Controllers\system;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contacts()
    {
        $contacts = Contact::paginate(15);
        return view('system.contacts_admin', ['contacts' => $contacts]);
    }

    public function contactsEditShow($id)
    {
        $contact = Contact::find($id);
        return view('system.edit.contact_edit', ['contact' => $contact]);
    }

    public function addContact(Request $request)
    {
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        $contact = new Contact();
        $contact->firstname = $request->input('contactFirstName');
        $contact->lastname = $request->input('contactLastName');
        $contact->title_before_name = $request->input('contactTitleBefore');
        $contact->title_after_name = $request->input('contactTitleAfter');
        $contact->telephone_work = $request->input('contactPhoneNumberWork');
        $contact->workplace = $request->input('contactWorkPlace');
        $contact->phone = $request->input('contactPhoneNumberPersonal');
        $contact->email = $request->input('contactEmail');
        $contact->room = $request->input('contactRoom');
        $contact->save();

        return redirect('/admin/contacts');
    }

    public function editContact(Request $request)
    {
        $validation = $this->validateCreate($request);
        if ($validation->fails()) {
            Session::flash('error', $validation->messages()->first());
            return redirect()->back()->withInput();
        }

        $contact = Contact::find($request->input('ID'));
        $contact->firstname = $request->input('contactFirstName');
        $contact->lastname = $request->input('contactLastName');
        $contact->title_before_name = $request->input('contactTitleBefore');
        $contact->title_after_name = $request->input('contactTitleAfter');
        $contact->telephone_work = $request->input('contactPhoneNumberWork');
        $contact->workplace = $request->input('contactWorkPlace');
        $contact->phone = $request->input('contactPhoneNumberPersonal');
        $contact->email = $request->input('contactEmail');
        $contact->room = $request->input('contactRoom');
        $contact->save();

        return redirect('/admin/contacts');
    }

    public function deleteContact($id){
        Contact::find($id)->delete();
        return redirect('/admin/contacts');
    }

    public function validateCreate($request)
    {
        $validator = Validator::make($request->all(), [
            'contactFirstName' => 'required',
            'contactLastName' => 'required',
            'contactPhoneNumberWork' => 'required',
            'contactEmail' => 'required'
        ]);

        return $validator;


    }
}