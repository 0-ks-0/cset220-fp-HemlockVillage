<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::insertData("admin", "first", "a@example.com", "2000-02-02", "123-456-7890", "admin", 1, 1);
        self::insertData("supervisor", "first", "s@example.com", "1985-09-23", "321-654-9870", "supervisor", 2, 1);
        self::insertData("doctor", "first", "d@example.com", "1990-03-15", "456-789-1230", "doctor", 3, 1);
        self::insertData("caregiver", "first", "c@example.com", "1992-07-10", "987-654-3210", "caregiver", 4, 1);
        self::insertData("patient", "first", "p@example.com", "1950-02-25", "234-567-8901", "patient", 5, 1);
        self::insertData("family", "first", "f@example.com", "1995-11-17", "345-678-9012", "family", 6, 1);

        self::insertData("caregiver", "two", "c2@example.com", "1992-07-10", "345-678-9013", "caregiver", 4, 1);
        self::insertData("caregiver", "three", "c3@example.com", "1995-11-17", "345-678-9014", "caregiver", 4, 1);
        self::insertData("caregiver", "four", "c4@example.com", "1995-11-17", "345-678-9015", "caregiver", 4, 1);
        self::insertData("caregiver", "five", "c5@example.com", "1989-08-25", "345-678-9016", "caregiver", 4, 1);
        self::insertData("caregiver", "six", "c6@example.com", "1990-12-11", "345-678-9017", "caregiver", 4, 1);
        self::insertData("caregiver", "seven", "c7@example.com", "1991-03-14", "345-678-9018", "caregiver", 4, 1);
    }

    private static function insertData($firstName, $lastName, $email, $dob, $phone, $password, $roleID, $approved = 0): void
    {
        User::create([
            "first_name" => $firstName,
            "last_name" => $lastName,
            "email" => $email,
            "date_of_birth" => $dob,
            "phone_number" => $phone,
            "password" => Hash::make($password),
            "role_id" => $roleID,
            "approved" => $approved
        ]);
    }
}
