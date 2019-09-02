<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientPayment extends Model
{
    protected $guarded=[];

    public function patient(){
        return $this->hasOne(Patient::class,'id','patient_id');
    }
}
