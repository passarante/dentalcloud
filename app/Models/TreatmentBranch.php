<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreatmentBranch extends Model
{
    protected $guarded = ['id'];

    public function treatments(){
        return $this->hasMany(Treatment::class);
    }
}
