<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\ModelHelper;

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

    public static function getBill($patientId)
    {
        return ModelHelper::getRow(Payment::class, "patient_id", $patientId)->bill ?? null;
    }
}
