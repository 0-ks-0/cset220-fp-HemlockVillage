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
        // Don't touch
        self::insertData(Patient::getId(5), "2024-11-01", "2024-11-02", 3, "Completed", "low on iron", "take 6mg iron supplement", "take 6mg iron supplement", "take 7mg iron supplement");
        self::insertData(Patient::getId(5), "2024-11-02", "2024-12-03", 3, "Completed", "slightly low on iron", "take 6mg iron supplement", null, null);
        self::insertData(Patient::getId(5), date("Y-m-d"), "2025-01-01", 3, "Pending");

        // Touchable
        // self::insertData(Patient::getId(1), "2024-12-01", "2024-12-01", 1, "Pending", "Routine check-up", "Take 1 multivitamin", "Apply lotion to dry areas", "Drink herbal tea before bed");
        // self::insertData(Patient::getId(2), "2024-11-25", "2024-11-25", 2, "Completed", "Annual physical", "Take blood pressure medication", "Hydrate with water", "Take pain reliever as needed");
        // self::insertData(Patient::getId(3), "2024-12-05", "2024-12-05", 3, "Missing", "Blood sugar check-up", null, "Drink glucose solution", null);
        // self::insertData(Patient::getId(4), "2024-12-10", "2024-12-10", 4, "Completed", "Follow-up after minor surgery", "Take antibiotic pill", "Take a light walk", "Apply wound dressing");
        // self::insertData(Patient::getId(6), "2024-11-20", "2024-11-20", 6, "Completed", "New symptoms evaluation", "Take anti-inflammatory", null, "Avoid sugary drinks");
        // self::insertData(Patient::getId(7), "2024-12-18", "2024-12-18", 7, "Pending", "Physical therapy assessment", "Stretch in the morning", "Attend therapy session", null);
        // self::insertData(Patient::getId(8), "2024-11-30", "2024-11-30", 8, "Missing", "Lab test follow-up", null, null, "Fast after 8 PM");
        // self::insertData(Patient::getId(9), "2024-12-22", "2024-12-22", 9, "Completed", "Routine vitals check", "Take prescribed medication", null, "Relax before bedtime");
        // self::insertData(Patient::getId(10), "2024-12-24", "2024-12-24", 10, "Pending", "Pre-holiday check-up", "Take morning supplements", "Avoid heavy meals", null);
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
