<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationProcess extends Model
{
    //
    public function volunteer()
    {
        return $this->hasOne('App\Models\Volunteer','id','volunteer_id');
    }
    public function benifactor()
    {
        return $this->belongsTo('App\Models\benifactor');
    }
    public function donationMedication()
    {
        return $this->hasMany('App\Models\DonationMedication','donation_process_id','id');
    }

   
}
