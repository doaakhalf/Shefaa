<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //
    // public function donation_medication()
    // {
    //     return $this->belongsTo('App\Models\DonationMedication');
    // }
    public function donation_process()
    {
        return $this->belongsToMany('App\Models\DonationProcess');
    }
}
