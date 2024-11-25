<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\ModelHelper;

class Appointment extends Model
{
    protected $fillable = [
        "patient_id",
        "date_scheduled",
        "appointment_date",
        "doctor_id",
        "status_id",
        "comment"
    ];

    public static function getId($patientID, $appointmentDate)
    {
        return ModelHelper::getIdWithConditions(Appointment::class, [
            [ "patient_id", '=', $patientID ],
            [ "appointment_date", "=", $appointmentDate ]
        ]);
    }
}
