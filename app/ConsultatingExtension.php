<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultatingExtension extends Model
{
    protected $guarded = [];

    public function ConsultatingExtension()
    {
        return $this->belongsTo(Consultating::class ,'consultation_id');
    }
}
