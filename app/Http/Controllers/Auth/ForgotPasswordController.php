<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;



class ForgotPasswordController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        if(Auth::check()){
            return back();
        }
        return view('client.app.account', ['view' => 'forget_password']);
    }

    protected $redirectTo = '/prihlasovanie';


    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        )->withInput($request->only('email'));
    }



}
