<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        "patient_id",
        "date_assigned",
        "group_num"
    ];
}
