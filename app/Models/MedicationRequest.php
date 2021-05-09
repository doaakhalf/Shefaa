<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicationRequest extends Model
{
    //
    public function medicine()
    {
        return $this->hasMany('App\Models\Medicine','id','medicine_id');
    }
    public function medicationProcess()
    {
        return $this->BelongsTo('App\Models\DonationMedication','request_id','id');
    }
}
