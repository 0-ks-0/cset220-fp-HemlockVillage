<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrescriptionStatus extends Model
{
    protected $fillable = [
        "prescription_id",
        "morning",
        "afternoon",
        "night"
    ];
}
