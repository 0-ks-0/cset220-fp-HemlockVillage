<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ModelHelper;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Models\Employee;
use App\Models\Appointment;
use App\Models\Patient;

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