<?php

namespace App\Http\Controllers\Auth;

use App\Http\Variables;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('app.login_bad')],
        ])->redirectTo(route('login'));
    }


    public function showLoginForm()
    {
        if (Auth::check()) {
            return back();
        }

        return view('client.app.account', ['view' => 'login', 'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]);
    }

    protected function authenticated(Request $request, $user)
    {

        if (!$user->verified) {
            auth()->logout();
            return back()->with('verify', Lang::get('app.login_account_not_confirmed'));
        }

        if ($user->hasRole("student")) {
            return redirect('/profil');
        } else if ($user->hasRole("organizator")) {
            return redirect('/dashboard');
        } else if ($user->hasRole("administrator")) {
            return redirect('/dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}