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
        self::insertData(Str::random(16), 5, Str::random(16), "John Doe", '111-111-1111', "Brother");
    }

    private static function insertData($id, $userID, $familyCode, $econtactName, $econtactPhone, $relation): void
    {
        Patient::create([
            "id" => $id,
            "user_id" => $userID,
            "family_code" => $familyCode,
            "econtact_name" => $econtactName,
            "econtact_phone" => $econtactPhone,
            "econtact_relation" => $relation
        ]);
    }
}
