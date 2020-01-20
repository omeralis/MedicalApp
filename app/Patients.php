<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $guarded = [];

    public function PatientsConsultating()
    {
        return $this->hasMany(Consultating::class);
    }
}
