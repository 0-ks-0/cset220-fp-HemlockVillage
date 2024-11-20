<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $filalble = [
        "patient_id",
        "meal_date"
    ];
}
