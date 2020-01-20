<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $guarded = [];

    public function EvaluationDoctors()
    {
        return $this->belongsTo(Doctors::class ,'doctor_id');
    }
}
