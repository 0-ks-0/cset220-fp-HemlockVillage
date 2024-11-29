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

    /**
     * Update the bill for the patient if the patient id exists and the amount is positive
     *
     * @param int $patientId
     * @param float $amount
     */
    public static function updateBill($patientId, $amount)
    {
        // Do nothing if not a positve amount
        if ($amount <= 0) return;

        $row = ModelHelper::getRow(Payment::class, "patient_id", $patientId);

        // Row with this patient id does not exist
        if (!$row) return;

        $row->update([ "bill" => ($row->bill - $amount) ]);
    }
}
