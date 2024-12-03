<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

use App\Models\PrescriptionStatus;
use App\Models\Appointment;

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
	 * Get the prescription status, appointment info for prescriptions, and the doctor info for a patient on a given date
	 * @param string $patienId The id of hte patient
	 * @param string $date The date of the appointment
	 */
	public static function getPatientPrescriptionStatusAppointmentByDate($patientId, $date)
	{
		// ======== TODO if there is no prescription status for today, create a default one using the most recent appointment id that is marked as completed

		return PrescriptionStatus::with([
			"appointment" => fn($q) => $q->select("id", "patient_id", "doctor_id", "status", "comment", "morning", "afternoon", "night"),
			"appointment.doctor.user" => fn($q) => $q->select("id", "first_name", "last_name")
		])
        ->where("prescription_date", $date)
        ->whereHas("appointment", function ($query) use ($patientId)
        {
            $query->where("patient_id", "=", $patientId);
        })
		->select("id", "appointment_id", "morning", "afternoon", "night")
		->first();
	}

	/**
	 * Get the prescription info from the appointments table
	 *
	 * @param model $patientPrescriptionStatusAppointment The result of the function getPatientPrescriptionStatusAppointmentByDate($patientId, $date)
	 */
	public static function getPatientPrescriptionByDate($patientPrescriptionStatusAppointment)
	{
		$appointment = $patientPrescriptionStatusAppointment->appointment ?? null; // Appointment and doctor info

		return [
			"morning" => $appointment->morning ?? null,
			"afternoon" => $appointment->afternoon ?? null,
			"night" => $appointment->night ?? null,
		];
	}

	/**
	 * Get the prescription info from the appointments table
	 *
	 * @param model $patientPrescriptionStatusAppointment The result of the function getPatientPrescriptionStatusAppointmentByDate($patientId, $date)
	 */
	public static function getPatientPrescriptionStatusByDate($patientPrescriptionStatusAppointment)
	{
		return [
			"morning" => $patientPrescriptionStatusAppointment->morning ?? null,
			"afternoon" => $patientPrescriptionStatusAppointment->afternoon ?? null,
			"night" => $patientPrescriptionStatusAppointment->night ?? null,
		];
	}

	public static function getPatientMealStatusByDate($patientId, $date)
	{
		$meal = DB::table("meals")->where([
            [ "patient_id", "=", $patientId ],
            [ "meal_date", "=", $date ]
        ])->first();

		return [
			"meal_id" => $meal->id ?? null,
			"status_data" => [
				"breakfast" => $meal->breakfast ?? null,
				"lunch" => $meal->lunch ?? null,
				"dinner" => $meal->dinner ?? null,
				]
		];
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

	public static function convertGroupNumToRosterCaregiverColumn($groupNum)
	{
		switch ($groupNum)
		{
			case "1": return "caregiver_one_id";
			case "2": return "caregiver_two_id";
			case "3": return "caregiver_three_id";
			case "4": return "caregiver_four_id";
			default: return null;
		}
	}
}
