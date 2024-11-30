<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\ModelHelper;

class Patient extends Model
{
    protected $fillable = [
        "id",
        "user_id",
        "family_code",
        "econtact_name",
        "econtact_phone",
        "econtact_phone",
        "econtact_relation"
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, "patient_id");
    }

    public static function getId($userID)
    {
        return ModelHelper::getId(Patient::class, "user_id", $userID);
    }
}
