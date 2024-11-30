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

    public function patient()
    {
        return $this->belongsTo(Patient::class, "patient_id");
    }

    public function doctor()
    {
        return $this->belongsTo(Employee::class, 'doctor_id');
    }

    public function prescriptions()
    {
        return $this->hasOne(Prescription::class, "appointment_id");
    }

    public static function getId($patientID, $appointmentDate)
    {
        return ModelHelper::getIdWithConditions(Appointment::class, [
            [ "patient_id", '=', $patientID ],
            [ "appointment_date", "=", $appointmentDate ]
        ]);
    }
}
