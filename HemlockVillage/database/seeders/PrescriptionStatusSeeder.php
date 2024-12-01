<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PrescriptionStatus;

class PrescriptionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData(1, "2024-11-03", "Completed", "Completed", "Completed");
    }

    private static function insertData($appointmentId, $date, $morning, $afternoon, $night): void
    {
        PrescriptionStatus::create([
            "appointment_id" => $appointmentId,
            "prescription_date" => $date,
            "morning" => $morning,
            "afternoon" => $afternoon,
            "night" => $night,
        ]);
    }
}
