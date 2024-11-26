<?php

namespace App\Http\Controllers\Regular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public static function showLoginForm()
    {
        return view("login");
    }

    public static function login(Request $Request)
    {
        $credentials = $Request->validate([
            "email" => [ "bail", "required" ],
            "password" => [ "bail", "required" ]
        ]);

        // Fail to match credentials
        if (!Auth::attempt($credentials))
            return redirect()->back()->withErrors([ "Invalid email address and password combination." ]);

        // Not approved
        if (!Auth::user()->approved)
            return redirect()->back()->withErrors([ "Please wait for your account to be approved." ]);

        // Success
        $Request->session()->regenerate();

        return redirect()->intended("/home");
    }
}