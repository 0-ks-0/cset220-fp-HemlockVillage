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
        // Don't touch
        self::insertData("2024-11-03", 2, 3, 4, 5, 6, 7, 8);

        // Touchable - don't insert null values
        // self::insertData("2024-11-03", 2, 3, 4, 5, 6, 7);
        // self::insertData("2024-11-04", 1, 2, 8, 9, 10, null);
        // self::insertData("2024-11-05", 3, 4, 11, 12, null, null);
        // self::insertData("2024-11-06", 4, 5, 13, 14, 15, null);
        // self::insertData("2024-11-07", 5, 6, 16, 17, 18, null);
        // self::insertData("2024-11-08", 6, 7, 19, 20, 21, 22);
        // self::insertData("2024-11-09", 7, 8, 23, 24, 25, null);
        // self::insertData("2024-11-10", 8, 9, 26, 27, 28, null);
        // self::insertData("2024-11-11", 9, 10, 29, 30, 31, null);
        // self::insertData("2024-11-12", 10, 11, 32, 33, null, null);
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
