<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestMedicine extends Model
{
    //Request form
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
    public function volunteer()
    {
        return $this->belongsTo('App\Models\Volunteer');
    }
    public function medicationRequest()
    {
        return $this->hasMany('App\Models\MedicationRequest','request_id','id');
    }
}
