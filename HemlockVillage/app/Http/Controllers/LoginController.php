<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Session;





class LoginController extends Controller
{
    function showLoginForm()
    {
        return view("login");
    }

    function checkLogin(Request $Request)
    {
        $Credentials = $Request->validate([
            "email" => [ "bail", "required" ],
            "password" => [ "bail", "required" ]
        ]);
        Log::info("login1");


        if (Auth::attempt($Credentials))
        {
            // Success
            Log::info("lsuccess");

            $Request->session()->regenerate();
            // return redirect()->intended("/home"); // double check what this does
            return redirect("/home");
        }
        else
        {
            // Fail
            Log::info("lfail");
            return redirect()->back()->withErrors([ "Invalid email address and password combination" ]);
        }
    }

    public static function home()
    {
        $Test = Auth::check() ? "Logged in" : "Not logged in";

        return view("home", [ "TestMessage" => $Test]);
    }

    public function logout(Request $request)
    {
        // $request->session()->flush();
        // return redirect('/')->with('message', 'Logged out successfully');

        // Clear the login session
        // Session::forget('login');

        // Invalidate the session for the authenticated user
        // $user = Auth::user();
        // Auth::guard()->invalidate($user);

        // // Perform any other logout logic...

        // return redirect('/')->with('message', 'Logged out successfully');

        // Logout the authenticated user
        Auth::logout();

        // Optionally invalidate the session if you want to clear all session data
        $request->session()->invalidate();

        // Optionally regenerate the session ID for security
        $request->session()->regenerateToken();

        // Redirect to the home page with a success message
        return redirect('/')->with('message', 'Logged out successfully');
    }
}
