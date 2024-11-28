<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\ModelHelper;

class Payment extends Model
{
    protected $fillable = [
        "patient_id",
        "last_updated_date",
        "bill"
    ];

    public static function getBill($patientId)
    {
        return ModelHelper::getRow(Payment::class, "patient_id", $patientId)->bill ?? null;
    }

    public static function updateBill($patientId, $amount)
    {
        // TODO validate $amount > 0

        $row = ModelHelper::getRow(Payment::class, "patient_id", $patientId);

        // TODO validate $row

        $row->update([ "bill" => ($row->bill - $amount) ]);
    }

}
