<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultating extends Model
{
    protected $guarded = [];

    public function ConsultatingPatients()
    {
        return $this->belongsTo(Patients::class ,'patient_id');
    }
    public function ConsultatingSpecialtiones()
    {
        return $this->belongsTo(Specialtiones::class ,'specialtiones_id');
    }
    public function ConsultatingDoctor()
    {
        return $this->belongsTo(Doctors::class ,'doctor_id');
    }
    public function ConsultatingConsultatingExtension()
    {
        return $this->hasMany(ConsultatingExtension::class);
    }
   
}
