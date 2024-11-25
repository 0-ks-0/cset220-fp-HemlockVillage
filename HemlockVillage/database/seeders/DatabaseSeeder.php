<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Appointment;
use App\Helpers\ModelHelper;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            EmployeeSeeder::class,
            PatientSeeder::class,
            FamilySeeder::class,
            AdmissionSeeder::class,
            GroupSeeder::class,
            CompletionStatusSeeder::class,
            AppointmentSeeder::class,
            PrescriptionSeeder::class,
            PrescriptionStatusSeeder::class,
            MealSeeder::class,
            MealStatusSeeder::class,
            SalarySeeder::class,
            RosterSeeder::class,
            PaymentSeeder::class
        ]);
    }
}
