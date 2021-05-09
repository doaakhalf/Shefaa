<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    //
    protected $rules = [
       
        'name' => 'required',
        'username' => 'required|unique:patients',
        'address' => 'required',
        'phonenumber'=>'required|unique:patients',
    ];
    
    public function Request_Medicine()
    {
        return $this->hasMany('App\Models\RequestMedicine');
    }
}
