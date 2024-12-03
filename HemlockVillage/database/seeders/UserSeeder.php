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
        self::insertData("Mia", "Foster", "mia.foster@example.com", "1986-01-12", "555-928-2034", "admin123", 1, 1);
        self::insertData("Ethan", "Walker", "ethan.walker@example.com", "1992-02-25", "555-837-4932", "supervisor123", 2, 1);
        self::insertData("Dr. Olivia", "Hughes", "olivia.hughes@example.com", "1980-03-18", "555-746-2843", "doctor123", 3, 1); 
        self::insertData("Liam", "Nelson", "liam.nelson@example.com", "1994-06-04", "555-634-5732", "caregiver123", 4, 1);
        self::insertData("Chloe", "Reed", "chloe.reed@example.com", "1972-08-30", "555-527-6189", "patient123", 5, 1);
        self::insertData("Owen", "Parker", "owen.parker@example.com", "1996-04-17", "555-910-6723", "family123", 6, 1);
        self::insertData("Harper", "Scott", "harper.scott@example.com", "1983-11-08", "555-415-9235", "admin123", 1, 1);
        self::insertData("Lucas", "Evans", "lucas.evans@example.com", "1989-07-22", "555-724-8904", "supervisor123", 2, 1);
        self::insertData("Dr. Isabella", "King", "isabella.king@example.com", "1985-12-03", "555-623-4517", "doctor123", 3, 1); 
        self::insertData("Sophia", "Morris", "sophia.morris@example.com", "1990-09-14", "555-302-8569", "caregiver123", 4, 1);
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
