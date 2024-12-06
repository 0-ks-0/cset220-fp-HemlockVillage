<?php

namespace App\Http\Controllers\Regular;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ModelHelper;
use App\Http\Controllers\Api\SignupAPI;
use App\Models\Role; // Ensure you have the Role model

class SignupController extends Controller
{
    public static function index()
    {
        $familyCode = ModelHelper::getRandomString();

        session(['familyCode' => $familyCode]);

        return view("signup")->with([
            "roles" => Role::all(),
            "familyCode" => $familyCode
        ]);
    }

    public static function store(Request $request)
    {
        $response = SignupAPI::store($request);

        // Fails signup validation
        if ($response->getStatusCode() !== 200)
        {
            $errors = json_decode($response->getContent(), true)["errors"] ?? ["Invalid input(s). Please try again."];

            return redirect()->back()->withErrors($errors);
        }

        if ($response->getStatusCode() !== 200) {
            $errors = json_decode($response->getContent(), true)["errors"] ?? ["Invalid input(s). Please try again."];
            return redirect()->back()->withErrors($errors);
        }

        session()->forget("familyCode");

        // Save confirmation message for redirecting to login page
        session()->flash("success", "Your account has been created successfully. Please wait for approval to login.");

        return redirect()->route("login.form");
    }

}
