<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealStatus extends Model
{
    protected $filalble = [
        "meal_id",
        "breakfast",
        "lunch",
        "dinner"
    ];
}
