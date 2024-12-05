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

        if ($response->getStatusCode() !== 200) {
            $errors = json_decode($response->getContent(), true)["errors"] ?? ["Invalid input(s). Please try again."];
            return redirect()->back()->withErrors($errors);
        }

        session()->forget("familyCode");

        session()->flash("success", "Your account has been created successfully. Please wait for approval.");

        $roleId = $request->input('role_id'); // Assuming 'role_id' is sent in the form
        $role = Role::find($roleId);

        if (!$role) {
            return redirect()->route("login.form")->withErrors("Invalid role selected.");
        }

        // Redirect based on role access level
        switch ($role->access_level) {
            case 1:
                return redirect()->route('admin.home');
            case 2:
                return redirect()->route('supervisor.home');
            case 3:
                return redirect()->route('doctor.home');
            case 4:
                return redirect()->route('caregiver.home');
            case 5:
                return redirect()->route('patientshome.index');
            case 6:
                return redirect()->route('family.home');
            default:
                return redirect()->route("login.form")->withErrors("Unknown role.");
        }
    }
}
