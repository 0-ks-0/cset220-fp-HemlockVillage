<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\ModelHelper;

class CompletionStatus extends Model
{
    protected $fillable = [
        "status"
    ];

    public static function getId($status)
    {
        return ModelHelper::getId(CompletionStatus::class, "status", $status);
    }
}
