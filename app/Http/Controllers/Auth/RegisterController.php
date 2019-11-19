<?php
/**
 * Created by PhpStorm.
 * User: Miloš
 * Date: 13. 11. 2019
 * Time: 18:08
 */

namespace App\Http\Controllers\Auth;




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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use RegistersUsers;

    public function showRegistrationForm(){
        if(Auth::check()){
            return back();
        }
        return view('client.app.account', ['view' => 'register']);
    }

    protected function create(array $data)
    {

        $user = User::create([
            'first_name' => $data['firstname'],
            'last_name' => $data['lastname'],
            'email' => $data['email'],
            'newsletter' => 0,
            'password' => bcrypt($data['password']),
        ]);

        $user->roles()
            ->attach(Role::where('name', 'student')->first());


        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);

        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/prihlasovanie')->with('verify', 'We sent you an activation code. Check your email and click on the link to verify.');
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
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/prihlasovanie')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/prihlasovanie')->with('status', $status);
    }
}