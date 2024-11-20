<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        "date_assigned",
        "supervisor_id",
        "caregiver_one_id",
        "caregiver_two_id",
        "caregiver_three_id",
        "caregiver_four_id"
    ];
}
