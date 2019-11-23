<?php

namespace App\Http\Controllers\Auth;

use App\Http\Variables;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check()) {
            return back();
        }
        return view('client.app.account', ['view' => 'forget_password', 'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]);
    }

    protected $redirectTo = '/prihlasovanie';


    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        )->withInput($request->only('email'));
    }


}
