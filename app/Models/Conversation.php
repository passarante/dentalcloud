<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

       public function getFullNameAttribute(){
        return $this->name . " " . $this->last_name;
    }
}
