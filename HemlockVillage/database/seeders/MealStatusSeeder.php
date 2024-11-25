<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\MealStatus;

class MealStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData(1, 1, 2, 3);
    }

    private static function insertData($mealID, $breakfast, $lunch, $dinner): void
    {
        MealStatus::create([
            "meal_id" => $mealID,
            "breakfast" => $breakfast,
            "lunch" => $lunch,
            "dinner" => $dinner,
        ]);
    }
}
