<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
   protected $guarded=['id'];

   public function patients(){
       return $this->belongsTo(Patient::class);
   }

   public function appointments(){
        return $this->belongsTo(Appointment::class);
   }

    public function getFullNameAttribute()
    {
        return $this->name . " " . $this->last_name;
    }
}
