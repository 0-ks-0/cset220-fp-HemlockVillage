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
        self::insertData(1);
        self::insertData(2);
        self::insertData(3);
        self::insertData(4);
    }

    private static function insertData($userID): void
    {
        Employee::create([
            "user_id" => $userID
        ]);
    }
}
