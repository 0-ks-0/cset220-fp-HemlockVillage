<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\ModelHelper;

class Employee extends Model
{
    protected $fillable = [
        "user_id"
    ];

    public static function getId($userID)
    {
        return ModelHelper::getId(Employee::class, "user_id", $userID);
    }
}
