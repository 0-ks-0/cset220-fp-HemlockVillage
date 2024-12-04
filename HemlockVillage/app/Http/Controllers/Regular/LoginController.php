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

        // Redirect based on role
        $user = Auth::user();
        if ($user->role->access_level === 3) {
            return redirect()->route('doctorshome.index'); // Doctor's homepage
        } else if ($user->role->access_level === 1) {
            return redirect()->route('admin.home'); // Admin homepage
        } else if ($user->role->access_level === 2) {
            return redirect()->route('supervisor.home'); // Supervisor homepage
        } else {
            return redirect()->route('home'); // Default redirection for other roles
        }
    }

    public static function logout(Request $request)
    {
        // Logout the authenticated user
        Auth::logout();

        // Invalidate the session to clear all session data
        $request->session()->invalidate();

        // Regenerate the session ID for security
        $request->session()->regenerateToken();

        session()->flash('success', 'Logged out successfully!');

        return redirect()->route("login.form");
    }
}

