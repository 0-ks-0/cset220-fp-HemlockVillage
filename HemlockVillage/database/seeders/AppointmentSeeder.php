<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Appointment;
use App\Models\Patient;

use DateTime;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData(Patient::getId(5), "2024-11-01", "2024-11-02", 3, "Completed", "low on iron", "take 6mg iron supplement", "take 6mg iron supplement", "take 7mg iron supplement");
        self::insertData(Patient::getId(5), date("Y-m-d"), "2025-01-01", 3, "Pending");
    }

    private static function insertData($patientID, $dateScheduled, $appointmentDate, $doctorID, $status, $comment = null, $morning = null, $afternoon = null, $night = null): void
    {
        Appointment::create([
            "patient_id" => $patientID,
            "date_scheduled" => $dateScheduled,
            "appointment_date" => $appointmentDate,
            "doctor_id" => $doctorID,
            "status" => $status,
            "comment" => $comment ?? null,
            "morning" => $morning ?? null,
            "afternoon" => $afternoon ?? null,
            "night" => $night ?? null
        ]);
    }

}
