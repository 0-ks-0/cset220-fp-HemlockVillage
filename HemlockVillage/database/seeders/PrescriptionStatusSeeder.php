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
        self::insertData(2, "2024-10-02", "Completed", "Missing", "Pending");
        self::insertData(3, "2024-09-04", "Missing", "Completed", "Completed");
        self::insertData(4, "2024-11-04", "Completed", "Completed","Completed");
        self::insertData(5, "2024-12-01", "Missing", "Completed", "Pending");
        self::insertData(6, "2024-10-03", "Completed", "Completed", "Completed"); 
        self::insertData(7, "2024-08-23", "Completed", "Completed", "Completed");
        self::insertData(8, "2024-07-15", "Pending", "Missing", "Completed");
        self::insertData(9, "2024-06-30", "Completed", "Completed", "Pending");
        self::insertData(10, "2024-05-10", "Missing", "Completed", "Completed");
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
