<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationMedication extends Model
{
    //
    public function medicine()
    {
        return $this->hasMany('App\Models\Medicine','id','medicine_id');
    }
    public function donationProcess()
    {
        return $this->BelongsTo('App\Models\DonationProcess','id','donation_process_id');
    }
}
