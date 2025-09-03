<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{


    public static function login($usr, $password)
    {

        $user = User::where('usr', $usr)->first();

        if ($user && $user->pswd === md5($password)) {
            Auth::login($user);
            return true;
        }
        return false;
    }
}
