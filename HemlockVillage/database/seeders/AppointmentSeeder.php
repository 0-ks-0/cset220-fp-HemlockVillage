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
        self::insertData(Patient::getId(5), "2024-11-01", "2024-11-02", 3, "Completed", "low on iron", "take 6mg iron supplement", "take 6mg iron supplement", null);
        self::insertData(Patient::getId(5), "2024-11-02", "2024-12-03", 3, "Completed", "slightly low on iron", "take 6mg iron supplement", null, null);
        self::insertData(Patient::getId(5), date("Y-m-d"), "2025-01-01", 3, "Pending");

        self::insertData(Patient::getId(5), '2024-11-05', '2024-11-06', 3, 'Completed', 'test order date', null, null, null, null, null);
        self::insertData(Patient::getId(5), '2024-11-05', '2024-12-25', 3, 'Pending', 'test ordering of future date. this comment in reality should not be here, but just here to inform its purpose...', null, null, null, null, null);

        // // Touchable
        // Should be inserting prescriptions for each time of day
        // self::insertData(Patient::getId(37), '2024-12-01', '2024-12-10', 25, "Pending", "Back pain", "apply heat therapy", "Take rest", 'morning');
        // self::insertData(Patient::getId(38), '2024-12-05', '2024-12-15', 26, "Completed", "High blood pressure", "reduce salt intake",  "Increase exercise", 'afternoon');
        // self::insertData(Patient::getId(39), '2024-11-28', '2024-12-12', 25, "Pending", "Routine checkup", "general health review",  "Healthy diet", 'night');
        // self::insertData(Patient::getId(41), '2024-12-02', '2024-12-10', 27, "Completed", "Low vitamin B12", "take B12 supplement",  "Increase sunlight exposure", 'morning');
        // self::insertData(Patient::getId(43), '2024-11-25', '2024-12-11', 26, "Pending", "Allergy test", "avoid allergens",  null, 'afternoon');
        // self::insertData(Patient::getId(45), '2024-12-03', '2024-12-12', 25, "Completed", "Mild cold", "drink warm fluids",  "Take over-the-counter medication", null);
        // self::insertData(Patient::getId(46), '2024-11-20', '2024-12-13', 27, "Pending", "Follow-up on vaccination", "monitor side effects",  "Keep vaccination records updated", 'morning');
        // self::insertData(Patient::getId(47), '2024-12-01', '2024-12-09', 27, "Completed", "General fatigue", "increase rest",  "Hydrate regularly", 'afternoon');
        // self::insertData(Patient::getId(48), '2024-12-07', '2024-12-11', 26, "Pending", "Checkup after surgery", "monitor recovery",  "Follow post-surgery guidelines", 'night');
        // self::insertData(Patient::getId(35), '2024-12-05', '2024-12-09', 25, "Completed", "Minor injury", "apply antiseptic",  "Avoid heavy lifting", null);

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
