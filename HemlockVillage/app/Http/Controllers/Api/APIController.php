<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Helpers\ValidationHelper;

use App\Models\Patient;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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

        return $data->map( function ($d)
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
