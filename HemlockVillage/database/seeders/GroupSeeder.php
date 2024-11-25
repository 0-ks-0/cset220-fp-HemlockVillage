<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Group;
use App\Models\Patient;


class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData(Patient::getId(5), date("Y-m-d"), 1);
    }

    private static function insertData($patientID, $dateAssigned, $groupNum): void
    {
        Group::create([
            "patient_id" => $patientID,
            "date_assigned" => $dateAssigned,
            "group_num" => $groupNum
        ]);
    }

}
