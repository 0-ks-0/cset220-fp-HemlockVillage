<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        "patient_id",
        "last_updated_date",
        "bill"
    ];
}
