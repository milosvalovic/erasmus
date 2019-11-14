<?php

namespace App\Http\Controllers\client;


use App\Models\Address;
use App\Models\Contact;
use App\Models\Office_Hours;
use Illuminate\Routing\Controller;

class MobilitiesController extends Controller
{
    public function mobilities(){
        return view('client.app.mobilities', ['contact' => Contact::all()->toArray(), 'office_hours' => Office_Hours::all(), 'address' => Address::all()]);
    }
}