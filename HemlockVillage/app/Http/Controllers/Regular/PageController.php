<?php

namespace App\Http\Controllers\Regular;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\UserAPI;
use App\Http\Controllers\Api\HomeAPI;

use App\Models\Patient;
use App\Models\Employee;

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
                // return HomeAPI::showCaregiver(4, "2024-11-03");

                $caregiverId = Employee::getId($userId);

                return view("caregivershome")->with([
                    "data" => HomeAPI::showCaregiver($caregiverId, Carbon::today())
                ]);

            case 5: // Patient
                $patientId = Patient::getId($userId);

                // return HomeAPI::showPatient($patientId, Carbon::today());
                // return HomeAPI::showPatient($patientId, "2024-11-03");

                return view("patientshome")->with([
                    "data" => HomeAPI::showPatient($patientId, Carbon::today())
                ]);

            case 6: // Family
                /**
                 * Default home page with inputs only
                 */
                if (empty(request()->query()))
                    // return Carbon::today()->format("Y-m-d");
                    return view("familyhome")->with("date", Carbon::today()->format("Y-m-d"));

                /**
                 * Validate that both patient id and family code are submitted
                 */
                $validatedPatient = Validator::make(request()->all(), [
                    "patient_id" => [ "required", "exists:patients,id" ],
                    "family_code" => [ "required", "exists:patients,family_code" ],
                ]);

                // Fails validation
                if ($validatedPatient->fails())
                    return redirect()->back()->withErrors($validatedPatient->errors());

                /**
                 * Data retrieval
                 */
                $patientId = request()->get("patient_id");
                $familyCode = request()->get("family_code");

                // --- To test, set date to 2024-11-03
                // $date = "2024-11-03";

                // http://127.0.0.1:8000/home?family_code=i0G6Go5kXoZtbvoN&patient_id=4i8x59jTnu7uNAo7
                /**
                 * Retrieve response to check if success or failure
                 */
                $response = HomeAPI::showFamily($patientId, $familyCode, Carbon::today()->format("Y-m-d"));
                $jsonContent = json_decode($response->getContent(), true);

                // Fails Validation
                if ($response->getStatusCode() !== 200)
                {
                    $errors = $jsonContent["errors"] ?? ["Invalid input(s). Please try again."];

                    return redirect()->back()->withErrors($errors);
                }

                // Success
                // return $jsonContent["data"];

                return view("familyhome")->with("data", $jsonContent["data"]);

            case null:
                return response()->json(['error' => 'Could not find user id or access level'], 404);

            default:
                return "No home page for your access level";
        }
    }

    public static function homeWithDate($date)
    {
        $userId = Auth::user()->id;
        $accessLevel = ControllerHelper::getUserAccessLevel($userId);

        switch ($accessLevel)
        {
            case 3: // Doctor

                $doctorId = Employee::getId($userId);

                if (!$doctorId)
                    abort(500, "Could not find an employee id associated with your user id");

                // --- Uncomment to see the data only
                // return [
                //     "old" => HomeAPI::indexDoctor($userId),
                //     "upcoming" =>HomeAPI::showDoctor($doctorId, $date)
                // ];

                return view("doctorshome")->with([
                    "old" => HomeAPI::indexDoctor($userId),
                    "upcoming" =>HomeAPI::showDoctor($doctorId, $date)
                ]);

            default:
                return "You should not have access to this page otherwise";
        }
    }
}
