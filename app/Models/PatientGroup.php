<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientGroup extends Model
{
    protected $guarded=['id'];
        public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
