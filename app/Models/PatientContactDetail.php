<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientContactDetail extends Model
{
    protected $guarded = ['id'];

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
}
