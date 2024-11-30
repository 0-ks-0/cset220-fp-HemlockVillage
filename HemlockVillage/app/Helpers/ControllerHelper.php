<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

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

}
