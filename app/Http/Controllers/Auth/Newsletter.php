<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Lang;

class Newsletter extends Controller
{

    public function signIn()
    {
        if (Auth::check()) {
            $userEmail = Auth::user()->email;

            $updated = User::where('email', $userEmail)->update(['newsletter' => 1]);
            if ($updated > 0) {
                return json_encode(array('status' => 'success',
                    'reason' => Lang::get('app.newsletter_signup_success')));
            } else {
                return json_encode(array('status' => 'error',
                    'reason' => Lang::get('app.newsletter_signup_error')));
            }
        } else {
            return json_encode(array('status' => 'error',
                'reason' => Lang::get('app.newsletter_signup_not_logged_in')));
        }
    }

    public function signOut($email, $hash)
    {
        $updated = User::where('email', $email)->where('hash', $hash)->update(['newsletter' => 0]);
        if ($updated > 0) {
            return "<script>alert('".Lang::get('app.newsletter_signout_success')."');window.location.replace('/');</script>";
        } else {
            return "<script>alert('".Lang::get('app.newsletter_signout_error')."');window.location.replace('/');</script>";
        }
    }
}