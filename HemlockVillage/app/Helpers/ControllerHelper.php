<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

use App\Models\PrescriptionStatus;

class ControllerHelper
{
	/**
	 * Get the access level associated with the user
	 *
	 * @param int $userId
	 * @param int|null The access level if found
	 */
	public static function getUserAccessLevel($userId)
	{
		return DB::table("roles")
			->where("id", "=", function ($query) use ($userId)
			{
				$query->select("role_id")->from("users")->where("id", $userId);
			})->value("access_level");
	}

	/**
	 * Get the prescription status, appointment info for prescriptions, and the doctor info
	 */
	public static function getPatientPrescriptionStatusAppointmentByDate($patientId, $date)
	{
		// ======== TODO if there is no prescription status for today, create a default one using the most recent appointment id that is marked as completed

		return PrescriptionStatus::with(["appointment.doctor.user"])
        ->where("prescription_date", $date)
        ->whereHas("appointment", function ($query) use ($patientId)
        {
            $query->where("patient_id", "=", $patientId);
        })->first();

	}

	public static function getPatientMealStatusByDate($patientId, $date)
	{
		return DB::table("meals")->where([
            [ "patient_id", "=", $patientId ],
            [ "meal_date", "=", $date ]
        ])->first();
	}

	/**
	 * Translates the caregiver column name in the rosters table into the group number as a numeric string
	 * To be used to identify which group number a caregiver is responsible for
	 */
	public static function convertRosterCaregiverToNumeric($caregiverColumn)
	{
		switch ($caregiverColumn)
		{
			case "caregiver_one_id": return "1";
			case "caregiver_two_id": return "2";
			case "caregiver_three_id": return "3";
			case "caregiver_four_id": return "4";
			default: return null;
		}
	}
}
