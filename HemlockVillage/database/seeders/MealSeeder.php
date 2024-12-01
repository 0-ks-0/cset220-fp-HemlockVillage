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
