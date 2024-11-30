<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Employee;
use App\Models\Appointment;

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

        // Get all the appointments for the doctor
        $appointments = Appointment::with([ "patient", "patient.user", "prescriptions" ])
            ->where("doctor_id", $doctorId)
            ->get();

        // return response()->json($appointments);

        $data = $appointments->map(function ($a)
        {
            return [
                "patient_name" => "{$a->patient->user->first_name} {$a->patient->user->last_name}",
                "appointment_date" => $a->appointment_date,
                "comment" => $a->comment,
                "prescription" => $a->prescriptions ?? []
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
