<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Helpers\ValidationHelper;
use App\Helpers\ControllerHelper;

use App\Models\Patient;
use App\Models\Roster;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public static function indexRosterCreation()
    {
        return [
            "supervisors" => ControllerHelper::getEmployeeForRosterCreation("Supervisor"),
            "doctors" => ControllerHelper::getEmployeeForRosterCreation("Doctor"),
            "caregivers" => ControllerHelper::getEmployeeForRosterCreation("Caregiver")
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public static function storeRosterForm(Request $request)
    {
        /**
         * Validation
         */
        $validatedData = Validator::make($request->all(), [
            "date" => [ "required", "date", "unique:rosters,date_assigned", "after_or_equal:today" ],
            "supervisor" => [ "required", "exists:employees,id" ],
            "doctor" => [ "required", "exists:employees,id" ],
            "caregivers" => [ "required", "array", "size:4" ],
            "caregivers.*" => [ "exists:employees,id", "distinct" ], // Applies to each caregiver
        ], ValidationHelper::$roster);

        if ($validatedData->fails())
        {
            return response()->json([
                "success" => false,
                "message" => "Roster could not be created",
                "errors" => $validatedData->errors()
            ], 400);
        }

        /**
         * Creation
         */
        $roster = Roster::create([
            "date_assigned" => $request->get("date"),
            "supervisor_id" => $request->get("supervisor"),
            "doctor_id" => $request->get("doctor"),
            "caregiver_one_id" => $request->get("caregivers")[0],
            "caregiver_two_id" => $request->get("caregivers")[1],
            "caregiver_three_id" => $request->get("caregivers")[2],
            "caregiver_four_id" => $request->get("caregivers")[3]
        ]);

        // Success
        return response()->json([
            "success" => true,
            "message" => "Roster for date { {$request->get('date')} } has been created",
            "roster" => $roster
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public static function getReport($date)
    {
        ValidationHelper::validateDateFormat($date);

        // Status to search for
        $status = "Missing";

        // Eager load the data
        $data =  Patient::with([
            "user" => fn($q) => $q->select("id", "first_name", "last_name") ,
            "appointments" => fn($q) => $q->select("id", "patient_id", "doctor_id", "status", "morning", "afternoon", "night"),
            "appointments.doctor" => fn($q) => $q->select("id", "user_id"),
            "appointments.doctor.user" => fn($q) => $q->select("id", "first_name", "last_name"),
            "appointments.prescriptions" => fn($q) => $q->select("id", "appointment_id", "morning", "afternoon", "night"),
            "meals" => fn($q) => $q->select("id", "patient_id", "breakfast", "lunch", "dinner")
        ])
        ->whereHas("appointments", function ($q) use ($date, $status)
        {
            $q->where("status", $status)
                ->whereDate("appointment_date", $date);
        })
        ->orWhereHas("meals", function ($q) use ($date, $status)
        {
            $q->whereDate("meal_date", $date)
                ->where( function ($q) use ($status)
                {
                    $q->where("breakfast", $status)
                        ->orWhere("lunch", $status)
                        ->orWhere("dinner", $status);
                });
        })
        ->orWhereHas("appointments.prescriptions", function ($q) use ($date, $status)
        {
            $q->whereDate("prescription_date", $date)
                ->where( function ($q) use ($status)
                {
                    $q->where("morning", $status)
                        ->orWhere("afternoon", $status)
                        ->orWhere("night", $status);
                });
        })
        ->get();

        return $data->map( function ($d) use ($date)
        {
            $patient = $d->user ?? null;
            $doctor = $d->appointments->first()->doctor->user ?? null;
            $appointment = $d->appointments->first() ?? null;
            $prescriptionStatus = $d->appointments->first()->prescriptions->first() ?? null;
            $meal = $d->meals->first() ?? null;

            return [
                "patient_name" => $patient ? "{$patient->first_name} {$patient->last_name}" : null,
                "doctor_name" => $doctor ? "{$doctor->first_name} {$doctor->last_name}" : null,
                "appointment_status" => $appointment ? $appointment->status : null,
                "caregiver_name" => ControllerHelper::getPatientCaregiverByDate($d->id, $date)["caregiver_name"],
                "prescriptions" => [
                    "morning" => $appointment ? $appointment->morning : null,
                    "afternoon" => $appointment ? $appointment->afternoon : null,
                    "night" => $appointment ? $appointment->night : null,
                    ],
                "prescription_status" => [
                    "morning" => $prescriptionStatus ? $prescriptionStatus->morning : null,
                    "afternoon" => $prescriptionStatus ? $prescriptionStatus->afternoon : null,
                    "night" => $prescriptionStatus ? $prescriptionStatus->night : null,
                    ],
                "meal_status" => [
                    "breakfast" => $meal ? $meal->breakfast : null,
                    "lunch" => $meal ? $meal->lunch : null,
                    "dinner" => $meal ? $meal->dinner : null,
                    ]
            ];
        });
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
