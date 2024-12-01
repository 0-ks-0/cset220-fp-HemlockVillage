<?php

namespace App\Http\Controllers\Regular;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\Helpers\ModelHelper;
use App\Http\Controllers\Api\SignupAPI;

class SignupController extends Controller
{
    public static function index()
    {
        $familyCode = ModelHelper::getRandomString();

        // Save to display family code in blade
        session(['familyCode' => $familyCode]);

        return view("signup")->with([
            "roles" => DB::table("roles")->get(),
            "familyCode" => $familyCode
        ]);
    }

    public static function store(Request $request)
    {
        SignupAPI::store($request);

        // No longer needed
        session()->forget("familyCode");

        // Save confirmation message for redirecting to login page
        session()->flash("success", "Your account has been created successfully. Please wait for approval to login.");

        return redirect()->route("login.form");
    }

}