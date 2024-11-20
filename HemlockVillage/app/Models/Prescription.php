<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        "appointment_id",
        "morning",
        "afternoon",
        "night"
    ];
}