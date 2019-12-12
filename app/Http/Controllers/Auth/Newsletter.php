<?php
/**
 * Created by PhpStorm.
 * User: Dusan
 * Date: 12.12.2019
 * Time: 12:23
 */

namespace App\Http\Controllers\Auth;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Newsletter extends Controller
{

    public function signIn()
    {
        if(Auth::check()) {
            $userEmail = Auth::user()->email;

            $updated = User::where('email', $userEmail)->update(['newsletter' => 1]);
            if ($updated > 0) {
                return $notification = ['success:newsletterSignIn'];
            } else {
                return $notification = ['error:newsletterSignIn'];
            }
        }else{
            return $notification = ['error:userLogIn'];
        }
    }

    public function signOut($email,$hash)
    {
        $updated = User::where('email',$email)->where('hash',$hash)->update(['newsletter' => 0]);
        if ($updated > 0) {
            return $notification = ['success:newsletterSignOut'];
        } else {
            return $notification = ['error:newsletterSignOut'];
        }
    }

}