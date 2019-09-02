<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    protected $guarded = ['id'];
    //protected $dates = ['beg', 'end'];
    public function getFullNameAttribute()
    {
        return $this->name . " " . $this->last_name;
    }
    public function getAppointmentHoursAttribute()
    {

        $begHour = Carbon::createFromFormat('Y-m-d H:i:s', $this->beg)->format('H:i');
        $endHour = Carbon::createFromFormat('Y-m-d H:i:s', $this->end)->format('H:i');
        return $begHour . ' - ' . $endHour;
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
