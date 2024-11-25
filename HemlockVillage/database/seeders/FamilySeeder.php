<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Family;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData(6);
    }

    private static function insertData($userID): void
    {
        Family::create([
            "user_id" => $userID
        ]);
    }
}
