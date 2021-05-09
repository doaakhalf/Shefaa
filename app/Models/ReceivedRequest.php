<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivedRequest extends Model
{
    //
    public function requestProcess()
    {
        return $this->hasOne('App\Models\RequestMedicine');
    }
}
