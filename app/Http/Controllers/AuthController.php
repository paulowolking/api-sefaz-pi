<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    public function logon(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();
        if ($user) {
            if (Hash::check($request->get('password'), $user->password)) {
                Auth::loginUsingId($user->id);

                if ($user->hasRole("admin")) {
                    return redirect(route('dashboard'));
                } elseif ($user->hasRole("other")) {
                    //TODO: Outros usuários
                } else {
                    return view('auth.restrito');
                }

            } else {
                return redirect(route('login'));
            }
        } else {
            return redirect(route('login'));
        }
    }

    public function restrito()
    {
        return view('auth.restrito');
    }
}
