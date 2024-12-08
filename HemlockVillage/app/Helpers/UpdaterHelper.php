<?php

namespace App\Helpers;

use Carbon\Carbon;

use App\Models\Patient;

class UpdaterHelper
{
	private static $dailyCharge = 10;
	private static $monthlyPrescriptionCharge = 5;
	private static $appointmentCharge = 50;

	// TODO add getter and setter functions for charge amounts

	/**
	 * Get the difference in full days between two dates.
	 *
	 * @param string|DateTime|Carbon $date1
	 * @param string|DateTime|Carbon $date2
	 * @return int The number of days between $date1 and $date2
	 */
	public static function getDaysDifference($date1, $date2)
	{
		/**
		 * Validation
		 */
		ValidationHelper::validateDateFormat($date1);
		ValidationHelper::validateDateFormat($date2);

		// Converts to Carbon instance if not already
		if (!($date1 instanceof Carbon))
			$date1 = Carbon::parse($date1);

		if (!($date2 instanceof Carbon))
			$date2 = Carbon::parse($date2);

		return $date1->diffInDays($date2);
	}

	/**
	 * Get the difference in full months between two dates.
	 *
	 * @param string|DateTime|Carbon $date1
	 * @param string|DateTime|Carbon $date2
	 * @return int The number of full months between $date1 and $date2
	 */
	public static function getFullMonthsDifference($date1, $date2)
	{
		/**
		 * Validation
		 */
		ValidationHelper::validateDateFormat($date1);
		ValidationHelper::validateDateFormat($date2);

		// Convert to Carbon instance if not already
		if (!($date1 instanceof Carbon))
			$date1 = Carbon::parse($date1);

		if (!($date2 instanceof Carbon))
			$date2 = Carbon::parse($date2);

		// Check the chronological order of the dates passed
		if ($date1 > $date2)
			list($date1, $date2) = [ $date2, $date1 ]; // Switch the dates to make them in chronological order

		return (int) $date1->diffInMonths($date2);
	}

	/**
	 * Add a daily charge to a patient's bill if not added for the current day
	 */
	public static function addDailyCharge($patientId)
	{
		/**
		 * Validation
		 */
		$patient = Patient::find($patientId);

		if (!$patient)
		{
			abort(400, "Patient could not be found");
		}

		/**
		 * Days calculation
		 */
		$currentDate = Carbon::today();
		$lastUpdated = Carbon::parse($patient->daily_updated_date);

		// Do nothing if no last updated date
		if (!$lastUpdated) return;

		$daysDifference = self::getDaysDifference($lastUpdated, $currentDate);

		/**
		 * Charge calculation
		 */
		// Don't do anything if last updated today
		if ($daysDifference === 0)
			return;

		$patient->update([
			"bill" => ( $patient->bill + $daysDifference * self::$dailyCharge ),
			"daily_updated_date" => $currentDate->format("Y-m-d")
		]);

		return response()->json([
			"message" => "The bill has been updated",
			"patient" => $patient
		]);
	}
}
