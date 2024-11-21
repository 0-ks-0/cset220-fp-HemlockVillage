<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = [
        "patient_id",
        "date_scheduled",
        "appointment_date",
        "doctor_id",
        "status_id",
        "comment"
    ];
}
