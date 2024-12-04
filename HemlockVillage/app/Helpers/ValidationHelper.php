<?php

namespace App\Helpers;

use DateTime;

class ValidationHelper
{
	public static $signup = [
		"role.required" => "The role field is mandatory.",
		"role.exists" => "The selected role is invalid.",

		"first_name.required" => "Please provide your first name.",
		"first_name.max" => "Your first name cannot exceed 50 characters.",

		"last_name.required" => "Please provide your last name.",
		"last_name.max" => "Your last name cannot exceed 50 characters.",

		"email.required" => "An email address is required.",
		"email.email" => "Please provide a valid email address.",
		"email.unique" => "The email address is already taken.",
		"email.max" => "Your email address cannot exceed 100 characters.",

		"date_of_birth.required" => "Date of birth is required.",
		"date_of_birth.date" => "Please provide a valid date for date of birth.",
		"date_of_birth.before" => "Date of birth must be before today.",
		"date_of_birth.date_format" => "Date of birth must be in the format YYYY-MM-DD.",

		"phone_number.required" => "Phone number is required.",
		"phone_number.max" => "Your phone number cannot exceed 20 characters.",

		"password.required" => "Password is required.",
		"password.confirmed" => "Passwords do not match.",

		"family_code.required_if" => "Family code is required if the role is Patient.",
		"family_code.in" => "The family code provided is invalid.",
		"family_code.unique" => "The family code is already in use.",
		"family_code.size" => "Family code must be exactly 16 characters.",

		"econtact_name.required_if" => "Emergency contact name is required if the role is Patient.",
		"econtact_name.max" => "Emergency contact name cannot exceed 128 characters.",

		"econtact_phone.required_if" => "Emergency contact phone is required if the role is Patient.",
		"econtact_phone.max" => "Emergency contact phone cannot exceed 20 characters.",

		"econtact_relation.required_if" => "Emergency contact relation is required if the role is Patient.",
		"econtact_relation.max" => "Emergency contact relation cannot exceed 50 characters.",
	];

	/**
	 * Validate the date format. Aborts if not valid
	 *
	 * @param string $date
	 * @param string $return date or datetime
	 * @return string|DateTime
	 */
	public static function validateDateFormat($date, $return = "date")
	{
		if (!strtotime($date))
			abort(400, "Not a date");

		$datetime = DateTime::createFromFormat("Y-m-d", $date);

		if (!$datetime || !$datetime->format("Y-m-d") === $date)
			abort(400, "Invalid date format");

		return $return === "date" ? $date : $datetime;
	}
}
