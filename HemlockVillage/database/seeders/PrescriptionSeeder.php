<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Prescription;

class PrescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData(1, "take 6mg iron supplement", "take 6mg iron supplement", "take 7mg iron supplement");
    }

    private static function insertData($appointmentID, $morning, $afternoon, $night): void
    {
        Prescription::create([
            "appointment_id" => $appointmentID,
            "morning" => $morning,
            "afternoon" => $afternoon,
            "night" => $night,
        ]);
    }

}
