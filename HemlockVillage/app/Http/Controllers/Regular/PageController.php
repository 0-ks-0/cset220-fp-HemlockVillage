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
use App\Http\Controllers\Api\APIController;
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

                // return  HomeAPI::indexDoctor($userId);

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
                return HomeAPI::showPatient($patientId, "2024-11-03");

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

            case 5:
                $patientId = Patient::getId($userId) ?? null;

                if (!$patientId) abort(400,"Patient could not be found");

                // To test, pass date as 2024-11-03
                // return HomeAPI::showPatient($patientId, $date);

                return view("patientshome")->with("data", HomeAPI::showPatient($patientId, $date));

            default:
                return "You should not have access to this page otherwise";
        }
    }

    public static function report()
    {
        // insert into rosters values (null, "2024-11-01", 2,3,4, null, null, null, null, null);

        // return APIController::getReport(Carbon::today());
        // return APIController::getReport("2024-11-01");

        return view("adminreport")->with("data", APIController::getReport(Carbon::today()));
    }

    /*
    *
    *   Roster
    *
    */
    public static function indexrosterForm()
    {
        return view("newroster")->with([
            "currentDate" => Carbon::today()->format("Y-m-d"),
            "employees" => APIController::indexRosterCreation()
        ]);
    }

    public static function storeRosterForm(Request $request)
    {
        /**
         * Check status
         */
        $response = APIController::storeRosterForm($request);
        $jsonDecoded = json_decode($response->getContent(), true);

        // Fails validation
        if ($response->getStatusCode() !== 200)
        {
            $errors = $jsonDecoded["errors"] ?? [ "Invalid inputs(s). Please try again" ];

            return redirect()->back()->withErrors($errors)->withInput(); // Pass back the inputted values as well
        }

        // Success
        return redirect()->back()
            ->with("message", $jsonDecoded["message"] ?? "Roster for date {$request->get('date')} has been created");
    }

    public static function showRoster()
    {
        /**
         * Check response status
         */
        // To test, pass date as 2024-11-03
        $reponse = APIController::showRoster(Carbon::today()->format("Y-m-d"));
        $jsonDecoded = json_decode($reponse->getContent(), true);

        // No roster
        if ($reponse->getStatusCode() !== 200)
        {
            return view("roster")->with([
                "message" => $jsonDecoded["message"],
                "data" => $jsonDecoded["data"]
            ]);
        }

        // Success
        return view("roster")->with([
            "data" => $jsonDecoded["data"]
        ]);
    }

    /**
     *
     * Payment
     *
     */

    public static function indexPayment()
    {
        return view("payments");
    }

    public static function showPayment($patientId)
    {
        $response = APIController::showPayment($patientId);
        $jsonDecoded = json_decode($response->getContent(), true);

        if ($response->getStatusCode() !== 200)
        {
            return view("payments")->with([
                "patientId" => $jsonDecoded["patientId"] ?? $patientId,
                "error" => $jsonDecoded["error"] ?? "Patient with id { {$patientId} } does not exist"
            ]);
        }

        return view("payments")->with([
            "patientId" => $jsonDecoded["patientId"] ?? $patientId,
            "bill" => $jsonDecoded["bill"] ?? 0,
        ]);
    }

    public static function updatePayment(Request $request, $patientId)
    {
        $response = APIController::updatePayment($request, $patientId);
        $jsonDecoded = json_decode($response->getContent(), true);

        if ($response->getStatusCode() !== 200)
        {
            return redirect()->back()->with([
                "patientId" => $jsonDecoded["patientId"] ?? $patientId,
                "bill" => $jsonDecoded["bill"],
                "errors" => $jsonDecoded["errors"] ?? [ "Patient with id { {$patientId} } does not exist" ]
            ]);
        }

        return redirect()->back()->with([
            "patientId" => $jsonDecoded["patientId"] ?? $patientId,
            "message" => $jsonDecoded["message"] ?? "$$request->amount has been paid",
            "bill" => $jsonDecoded["bill"] ?? 0,
        ]);
    }
}
