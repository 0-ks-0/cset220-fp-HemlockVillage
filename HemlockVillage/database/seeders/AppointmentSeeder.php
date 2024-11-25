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
        self::insertData(Patient::getId(5), "2024-11-01", "2024-11-02", 3, 3, "low on iron");
        self::insertData(Patient::getId(5), date("Y-m-d"), (new DateTime())->modify("+1 day")->format("Y-m-d"), 3, 2);
        self::insertData(Patient::getId(5), date("Y-m-d"), (new DateTime())->modify("+5 day")->format("Y-m-d"), 3, 2, "a comment");
    }

    private static function insertData($patientID, $dateScheduled, $appointmentDate, $doctorID, $statusID, $comment = null): void
    {
        Appointment::create([
            "patient_id" => $patientID,
            "date_scheduled" => $dateScheduled,
            "appointment_date" => $appointmentDate,
            "doctor_id" => $doctorID,
            "status_id" => $statusID,
            "comment" => $comment ?? null
        ]);
    }

}
