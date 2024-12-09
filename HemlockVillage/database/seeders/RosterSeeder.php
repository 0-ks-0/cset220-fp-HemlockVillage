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
        self::insertData("2024-12-04", 21, 25, 4, 5, 6, 7);
        self::insertData("2024-12-05", 22, 26, 8, 9, 10, 11);
        self::insertData("2024-12-06", 23, 27, 11, 12, 13, 14);
        self::insertData("2024-12-07", 24, 28, 13, 14, 15, 10);
        self::insertData("2024-12-08", 21, 29, 14, 13, 12, 11);
        self::insertData("2024-12-09", 22, 30, 13, 2, 3, 14);
        self::insertData("2024-12-10", 23, 31, 13, 14, 15, 13);
        self::insertData("2024-12-11", 24, 32, 5, 7, 8, 6);
        self::insertData("2024-12-12", 21, 33, 13, 3, 2, 5);
        self::insertData("2024-12-13", 22, 34, 12, 13, 2, 8);
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
