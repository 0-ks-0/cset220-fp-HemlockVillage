<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        "employee_id",
        "date_assigned",
        "salary"
    ];
}
