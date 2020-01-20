<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialtiones extends Model
{
    protected $guarded = [];
    
    public function SpecialtionesDoctor()
    {
        return $this->hasMany(Doctors::class); 
    }
    public function SpecialtionesConsultating()
    {
        return $this->hasMany(Consultating::class);
    }
}
