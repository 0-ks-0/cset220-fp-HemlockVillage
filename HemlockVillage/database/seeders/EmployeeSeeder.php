<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jamie's wonderful data
        self::insertData(1, 120_000);
        self::insertData(2, 90_000);
        self::insertData(3, 100_000);
        self::insertData(4, 65_000);
        self::insertData(7, 90_000);
        self::insertData(8, 45_500);
        self::insertData(9, 50_000);
        self::insertData(10, 70_500);

        // Katy's terrible data
        self::insertData(11, 68_000);
        self::insertData(12, 30_000);
        self::insertData(13, 80_000);
        self::insertData(14, 70_000);

        // Caregivers
        self::insertData(17, 65_000);
        self::insertData(18, 65_500);
        self::insertData(19, 64_800);
        self::insertData(20, 66_200);
        self::insertData(21, 64_500);
        self::insertData(22, 67_000);
    }

    private static function insertData($userID, $salary): void
    {
        Employee::create([
            "user_id" => $userID,
            "salary" => $salary ?? 0
        ]);
    }
}
