<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientTreatment extends Model
{
    protected $guarded =[];
        public function patient(){
        return $this->hasOne(Patient::class,'id','patient_id');
    }
}
