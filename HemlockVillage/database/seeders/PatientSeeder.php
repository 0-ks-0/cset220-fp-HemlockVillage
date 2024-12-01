<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData(Str::random(16), 5, Str::random(16), "John Doe", '111-111-1111', "Brother", "2024-11-01", "1", "2024-11-02", 15);
    }

    private static function insertData($id, $userID, $familyCode, $econtactName, $econtactPhone, $relation, $admissionDate, $groupNum, $lastUpdatedDate, $bill): void
    {
        Patient::create([
            "id" => $id,
            "user_id" => $userID,
            "family_code" => $familyCode,
            "econtact_name" => $econtactName,
            "econtact_phone" => $econtactPhone,
            "econtact_relation" => $relation,
            "admission_date" => $admissionDate ?? null,
            "group_num" => $groupNum ?? null,
            "last_updated_date" => $lastUpdatedDate ?? date("Y-m-d"),
            "bill" => $bill ?? 0
        ]);
    }
}
