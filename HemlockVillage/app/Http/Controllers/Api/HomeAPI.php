<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ControllerHelper;
use App\Helpers\ModelHelper;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

use App\Models\Employee;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\PrescriptionStatus;
use App\Models\Roster;

class HomeAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public static function indexDoctor(string $userId)
    {
        // get employee id of user
        $doctorId = Employee::getId($userId);

        // Get all past appointments for the doctor
        $appointments = Appointment::with([
            "patient",
            "patient.user"
        ])
        ->where("doctor_id", $doctorId)
        ->where("appointment_date", "<", Carbon::today())
        ->get();

        // return response()->json($appointments);

        $data = $appointments->map(function ($a)
        {
            $user = $a->patient->user;

            return [
                "patient_id" => $a->patient->id,
                "patient_name" => "{$user->first_name} {$user->last_name}",
                "appointment_date" => $a->appointment_date,
                "comment" => $a->comment,
                "prescription" => [
                    "morning" => $a->morning ?? null,
                    "afternoon" => $a->afternoon ?? null,
                    "night" => $a->night ?? null,
                ]
            ];
        });

        return response()->json($data);
    }

    public static function showPatient($patientId, $date)
    {
        $patient = Patient::find($patientId);

        if (!$patient) return response()->json([ "error" => "Patient could not be found" ], 404);

        $appointment = Appointment::with([
            "doctor.user"
        ])
        ->where("patient_id", "=", $patientId)
        ->whereDate("appointment_date", $date)
        ->first();

        $patientGroup = $patient->group_num ?? null;

        // Find the correct caregiver for patient
        $caregiverString = "";
        switch ($patientGroup)
        {
            case "1":
                $caregiverString = "one";
                break;
            case "2":
                $caregiverString = "two";
                break;
            case "3":
                $caregiverString = "three";
                break;
            case "4":
                $caregiverString = "four";
                break;
            default:
                $caregiverString = null;
        }

        // Dynamically determine which caregiver number is associated with patient group num
        $caregiverString = "caregiver_{$caregiverString}_id" ?? null;

        // Find caregiver info from users table
        $caregiver = DB::table("rosters")
            ->join("employees", "rosters.{$caregiverString}", "=", "employees.id")
            ->join("users", "employees.user_id", "=", "users.id")
            ->where("rosters.date_assigned", "=", $date)
            ->select("users.first_name", "users.last_name")
            ->first();

        /**
         *  Find prescription status of a patient for a date
         *  Add `::with(["appointment.patient"])` to get the appointment details
         */
        $prescriptionStatus = PrescriptionStatus::where("prescription_date", $date)
        ->whereHas("appointment", function ($query) use ($patientId)
        {
            $query->where("patient_id", "=", $patientId);
        })->first();

        // Find meal status of a patient for a date
        $mealStatus = DB::table("meals")->where([
            [ "patient_id", "=", $patientId ],
            [ "meal_date", "=", $date ]
        ])->first();

        return [
            "doctor_name" => $appointment ? "{$appointment->doctor->user->first_name} {$appointment->doctor->user->last_name}" : null, // Not null if there is an appointment that date
            "appointment_status" => $appointment ? $appointment->status : null, // Not null if there is an appointment that date
            "caregiver_name" => $caregiver ? "{$caregiver->first_name} {$caregiver->last_name}" : null,
            "prescription_status" => [
                "morning" => $prescriptionStatus->morning ?? null,
                "afternoon" => $prescriptionStatus->afternoon ?? null,
                "night" => $prescriptionStatus->night ?? null,
                ],
            "meal_status" => [
                "breakfast" => $mealStatus->breakfast ?? null,
                "lunch" => $mealStatus->lunch ?? null,
                "dinner" => $mealStatus->dinner ?? null,
                ]
        ];
    }

    public static function showCaregiver($caregiverId, $date)
    {
        /**
         * Get roster
         */
        // To test, set date 2024-11-03
        $roster = Roster::whereDate("date_assigned", $date)->first();

        // No roster created
        // --- Comment out for testing bypass
        if (!$roster)
            return response()->json("No roster has been created for today { " . Carbon::today()->format("Y-m-d") . " }");

        /**
         * Find group num that caregiver is assigned for
         */
        $groupNum = null;

        // Find which column the caregiver is under in the roster
        // --- Comment out for testing bypass of no roster
        foreach ($roster->getAttributes() as $col => $val)
        {
            if ($val === $caregiverId) $groupNum = $col;
        }

        // Get group num
        $groupNum = ControllerHelper::convertRosterCaregiverToNumeric($groupNum);

        // Caregiver is not on the roster
        // --- Comment out for testing bypass
        if (!$groupNum)
            return response()->json("You are not assigned on the roster today { " . Carbon::today()->format("Y-m-d") . " }");

        /**
         * Find all the patients under this group num
         */
        // --- Hard-code group_num value as 1 to test if needed to bypass
        $patients = Patient::join("users", "patients.user_id", "users.id")->where("group_num", $groupNum)->get();

        foreach ($patients as $p)
        {
            // To test, set date to 2024-11-03
            $PrescriptionStatusAppointment = ControllerHelper::getPatientPrescriptionStatusAppointmentByDate(Patient::getId($p->id), $date);

            $appointment = $PrescriptionStatusAppointment->appointment ?? null; // Appointment and doctor info

            $doctor = $PrescriptionStatusAppointment->appointment->doctor->user ?? null; // Doctor info specifically

            // To test, set date to 2024-11-01
            $meal = ControllerHelper::getPatientMealStatusByDate(Patient::getId($p->id), $date);

            $data[] = [
                "patient_id" => $p->id,
                "prescription_status_id" => $PrescriptionStatusAppointment->id ?? null,
                "meal_id" => $meal->id ?? null,
                "patient_name" => "{$p->first_name} {$p->last_name}",
                "doctor_name" => $doctor ? "{$doctor->first_name} {$doctor->last_name}" : null,
                "appointment_status" => $appointment->status ?? null,
                "prescriptions" => [
                    "morning" => $appointment->morning ?? null,
                    "afternoon" => $appointment->afternoon ?? null,
                    "night" => $appointment->night ?? null,
                    ],
                "prescription_status" => [
                    "morning" => $PrescriptionStatusAppointment->morning ?? null,
                    "afternoon" => $PrescriptionStatusAppointment->afternoon ?? null,
                    "night" => $PrescriptionStatusAppointment->night ?? null,
                    ],
                "meal_status" => [
                    "breakfast" => $meal->breakfast ?? null,
                    "lunch" => $meal->lunch ?? null,
                    "dinner" => $meal->dinner ?? null,
                    ]
            ];
        }
        return $data;
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
