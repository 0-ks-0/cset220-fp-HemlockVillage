<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Roster;

class RosterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData("2024-11-03", 2, 3, 4, null, null, null, null);
    }

    private static function insertData($dateAssigned, $supervisorID, $doctorID, $caregiverOneID, $caregiverTwoID, $caregiverThreeID, $caregiverFourID): void
    {
        Roster::create([
            "date_assigned" => $dateAssigned,
            "supervisor_id" => $supervisorID ?? null,
            "doctor_id" => $doctorID ?? null,
            "caregiver_one_id" => $caregiverOneID ?? null,
            "caregiver_two_id" => $caregiverTwoID ?? null,
            "caregiver_three_id" => $caregiverThreeID ?? null,
            "caregiver_four_id" => $caregiverFourID ?? null,
        ]);
    }
}
