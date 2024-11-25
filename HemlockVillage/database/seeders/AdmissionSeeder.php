<?php

namespace Database\Seeders;

use App\Models\Admission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Patient;

class AdmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData(Patient::getId(5), "2024-11-01");
    }

    private static function insertData($patientID, $dateAdmitted): void
    {
        Admission::create([
            "patient_id" => $patientID,
            "date_admitted" => $dateAdmitted
        ]);
    }
}
