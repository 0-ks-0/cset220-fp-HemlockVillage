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
    }

    private static function insertData($userID, $salary): void
    {
        Employee::create([
            "user_id" => $userID,
            "salary" => $salary ?? 0
        ]);
    }
}
