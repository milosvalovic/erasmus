<?php

namespace App\Http\Controllers\Auth;

use App\Http\Variables;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showResetForm(Request $request, $token = null)
    {
        return view('client.app.account')->with(
            ['view' => 'reset_password', 'token' => $token, 'email' => decrypt($request->email), 'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]
        );
    }

    protected $redirectTo = '/prihlasovanie';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
            $this->resetPassword($user, $password);
        }
        );

        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($response)
            : $this->sendResetFailedResponse($request, $response);
    }

    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
        event(new PasswordReset($user));
        redirect(route('login'));
    }
}
