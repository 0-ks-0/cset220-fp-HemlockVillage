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
        self::insertData("3948175629031748", 1, "5821947601823654", "John Doe", '111-111-1111', "Brother", "2024-11-01", "1", "2024-11-02", 15);
        self::insertData("7604293184765201", 2, "1923847560928345", "Jane Smith", '222-222-2222', "Sister", "2024-10-15", "2", "2024-11-05", 25);
        self::insertData("8572013946578203", 3, "3481906572834610", "Emily Davis", '333-333-3333', "Daughter", "2024-09-20", "3", "2024-11-10", 30);
        self::insertData("2098346571829347", 4, "6758901234567890", "Michael Brown", '444-444-4444', "Son", "2024-08-30", "4", "2024-11-12", 50);
        self::insertData("1029384756102938", 5, "5647382910564738", "Alice Johnson", '555-555-5555', "Daughter", "2024-07-25", "1", "2024-10-20", 40);
        self::insertData("1928374651928374", 6, "8473629105847362", "Robert Lee", '666-666-6666', "Nephew", "2024-06-15", "2", "2024-11-10", 20);
        self::insertData("5463728190546372", 7, "2948571630294857", "Susan Wilson", '777-777-7777', "Niece", "2024-05-10", "3", "2024-11-05", 60);
        self::insertData("8192053746819205", 8, "3658271940365827", "James Taylor", '888-888-8888', "Uncle", "2024-04-08", "4", "2024-11-03", 70);
        self::insertData("7364819205736481", 9, "1923048576192304", "Laura Brown", '999-999-9999', "Aunt", "2024-03-15", "1", "2024-11-01", 80);
        self::insertData("1029473658102947", 10, "4839205746483920", "David Miller", '000-000-0000', "Cousin", "2024-02-20", "2", "2024-10-30", 35);
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
