<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientPhoto extends Model
{
   protected $guarded=['id'];

   public function patient(){
       return $this->belongsTo(Patient::class);
   }
}
