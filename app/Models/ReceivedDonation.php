<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivedDonation extends Model
{
    //
    public function donationProcess()
    {
        return $this->hasOne('App\Models\DonationProcess');
    }
}
