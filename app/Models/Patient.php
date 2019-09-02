<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PatientPayment;

class Patient extends Model
{
    protected $guarded = ['id'];

    public function photos()
    {
        return $this->hasMany(PatientPhoto::class);
    }

    public function contact()
    {
        return $this->hasOne(PatientContactDetail::class);
    }

    public function detail()
    {
        return $this->belongsTo(PatientDetail::class);
    }

    public function group()
    {
        return $this->belongsto(PatientGroup::class);
    }

    public function doctors()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function treatments()
    {
        return $this->hasMany(PatientTreatment::class, 'patient_id', 'id');
    }

    public function ptreatments()
    {
        return $this->hasMany(PatientPTreatment::class, 'patient_id', 'id');
    }

    public function diagnoses()
    {
        return $this->hasMany(PatientDiagnose::class,'patient_id','id');
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id', 'id');
    }
    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'patient_id', 'id');
    }
    public function payments()
    {
        return $this->hasMany(PatientPayment::class, 'patient_id', 'id');
    }

    public function getFullNameAttribute()
    {
        return $this->name . " " . $this->last_name;
    }
}
