<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $guarded = [];

    public function Doctorsspecial()
    {
        return $this->belongsTo(Specialtiones::class ,'specialtiones_id');
    }
    // 
    public function Doctorscountry()
    {
        return $this->belongsTo(Country::class ,'country_id');
    }
    
    public function Doctorsevaluation()
    {
        return $this->hasMany(Evaluation::class );
    }
    public function DoctorConsultating()
    {
        return $this->hasMany(Consultating::class );
    }
}
