<?php

namespace App\Http\Controllers\Regular;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\UserAPI;
use App\Http\Controllers\Api\HomeAPI;

use App\Models\Patient;

use App\Helpers\ControllerHelper;
use Carbon\Carbon;

class PageController extends Controller
{
    public static function landing()
    {
        return view("landing");
    }

    public static function users()
    {
        return view("users")->with([
            "data" => UserAPI::index()
        ]);
    }

    public static function home()
    {
        $userId = Auth::user()->id;
        $accessLevel = ControllerHelper::getUserAccessLevel($userId);


        // Return view depending on access level of user
        switch ($accessLevel)
        {
            case 1: // Admin
                return redirect("/users");

            case 2: // Supervisor
                return redirect("/users");

            case 3: // Doctor
                // TODO dynamically generate page with data

                return  HomeAPI::indexDoctor($userId);

                return view("doctorshome")->with([
                    "data" => HomeAPI::indexDoctor($userId)
                ]);

            case 4: // Caregiver
                return view("caregivershome");

            case 5: // Patient
                $patientId = Patient::getId($userId);

                return HomeAPI::showPatient($patientId, Carbon::today());

                return view("patientshome")->with([
                    "data" => HomeAPI::showPatient($patientId, Carbon::today())
                ]);

            case 6: // Family
                return view("familyhome");

            case null:
                return response()->json(['error' => 'Could not find user id or access level'], 404);

            default:
                return "No home page for your access level";
        }
    }
}
