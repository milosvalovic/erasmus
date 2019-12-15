<?php

namespace App\Http\Controllers\system;


use Illuminate\Routing\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contacts()
    {
        $contacts = Contact::all();
        return view('system.contacts_admin',['contacts' => $contacts]);
    }

    public function countryEditShow($id)
    {
        $contact = Contact::find($id);
        return view('system.edit.contact_edit', ['contact' => $contact]);
    }


}