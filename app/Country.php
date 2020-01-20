<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];

    public function DoctorCountry()
    {
        return $this->hasMany(Doctors::class); 
    }
   
}
