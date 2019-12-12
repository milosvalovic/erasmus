<?php

namespace App\Http\Controllers\Auth;

use App\Http\Variables;
use App\Mail\VerifyMail;
use App\Models\Role;
use App\Models\User;
use App\Models\VerifyUser;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use RegistersUsers;

    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return back();
        }
        return view('client.app.account', ['view' => 'register', 'article_in_row' => Variables::NUMBER_OF_ARTICLES_IN_ROW]);
    }

    protected function create(array $data)
    {

        $user = new User();
        $user->first_name = $data['firstname'];
        $user->last_name = $data['lastname'];
        $user->email = $data['email'];
        $user->newsletter = 0;
        $user->password = bcrypt($data['password']);
        $user->roles_ID = 1;
        $user->save();


        $verifyUser = VerifyUser::create([
            'user_id' => $user->ID,
            'token' => str_random(40)
        ]);

        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/prihlasovanie')->with('verify', Lang::get('app.register_activation_code_send'));
    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = Lang::get('app.register_account_activated');
            } else {
                $status = Lang::get('app.register_account_activated');
            }
        } else {
            return redirect('/prihlasovanie')->with('warning', "Emailovú adresu sme nenašli");
        }

        return redirect('/prihlasovanie')->with('status', $status);
    }
}