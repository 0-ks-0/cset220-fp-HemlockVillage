<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Payment;
use App\Models\Patient;


class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData(Patient::getId(5), "2024-11-02", 15);
    }

    private static function insertData($patientID, $lastUpdatedDate, $bill): void
    {
        Payment::create([
            "patient_id" => $patientID,
            "last_updated_date" => $lastUpdatedDate,
            "bill" => $bill,
        ]);
    }
}
