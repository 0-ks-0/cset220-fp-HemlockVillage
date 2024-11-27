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
        self::insertData(1, 1, 2, 3);
    }

    private static function insertData($prescriptionID, $morning, $afternoon, $night): void
    {
        PrescriptionStatus::create([
            "prescription_id" => $prescriptionID,
            "morning" => $morning,
            "afternoon" => $afternoon,
            "night" => $night,
        ]);
    }
}
