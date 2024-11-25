<?php

namespace Database\Seeders;

use App\Models\CompletionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompletionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData("Missed");
        self::insertData("Pending");
        self::insertData("Completed");
    }

    private static function insertData($status): void
    {
        CompletionStatus::create([
            "status" => $status,
        ]);
    }
}
