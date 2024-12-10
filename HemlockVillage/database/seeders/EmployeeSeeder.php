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
        self::insertData(1, 120_000);
        self::insertData(2, 90_000);
        self::insertData(3, 100_000);
        self::insertData(4, 65_000);

        self::insertData(7, 65_000);
        self::insertData(8, 65_500);
        self::insertData(9, 64_800);
        self::insertData(10, 66_200);
        self::insertData(11, 64_500);
        self::insertData(12, 67_000);

        // Jamie's data
        self::insertData(13, 24_000);
        self::insertData(14, 140_000);
        self::insertData(15, 80_000);
        self::insertData(16, 17_000);
        self::insertData(17, 54_500);
        self::insertData(23, 90_000);
        self::insertData(22, 49_000);
        self::insertData(21, 62_000);

    }

    private static function insertData($userID, $salary = null): void
    {
        Employee::create([
            "user_id" => $userID,
            "salary" => $salary ?? 0
        ]);
    }
}
