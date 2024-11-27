<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Salary;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData(1, "2024-11-01", 120_000);
        self::insertData(2, "2024-11-01", 90_000);
        self::insertData(3, "2024-11-01", 100_000);
        self::insertData(4, "2024-11-01", 60_000);
        self::insertData(4, "2024-11-20", 65_000);
    }

    private static function insertData($employeeID, $dateAssigned, $salary): void
    {
        Salary::create([
            "employee_id" => $employeeID,
            "date_assigned" => $dateAssigned,
            "salary" => $salary,
        ]);
    }

}
