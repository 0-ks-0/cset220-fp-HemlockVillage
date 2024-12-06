<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Meal;
use App\Models\Patient;


class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData(Patient::getId(5), "2024-11-01", "Missing", "Completed", "Completed");
        self::insertData(Patient::getId(1), "2024-12-01", "Completed", "Completed", "Missing");
        self::insertData(Patient::getId(2), "2024-12-01", "Missing", "Completed", "Completed");
        self::insertData(Patient::getId(3), "2024-12-02", "Completed", "Missing", "Completed");
        self::insertData(Patient::getId(4), "2024-12-02", "Missing", "Missing", "Completed");
        self::insertData(Patient::getId(5), "2024-12-03", "Completed", "Completed", "Completed");
        self::insertData(Patient::getId(6), "2024-12-03", "Missing", "Completed", "Missing");
        self::insertData(Patient::getId(7), "2024-12-04", "Completed", "Missing", "Missing");
        self::insertData(Patient::getId(8), "2024-12-04", "Completed", "Completed", "Completed");
        self::insertData(Patient::getId(9), "2024-12-05", "Completed", "Completed", "Missing");
        self::insertData(Patient::getId(10), "2024-12-05", "Missing", "Missing", "Missing");
    }

    private static function insertData($patientID, $mealDate, $breakfast, $lunch, $dinner): void
    {
        Meal::create([
            "patient_id" => $patientID,
            "meal_date" => $mealDate,
            "breakfast" => $breakfast,
            "lunch" => $lunch,
            "dinner" => $dinner
        ]);
    }

}
