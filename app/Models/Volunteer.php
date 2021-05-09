<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Volunteer extends Authenticatable
{
    //
    protected $rules = [
       
        'name' => 'required',
        'username' => 'required|unique:patients',
        'birthdate' => 'required',
        'phonenumber'=>'required|unique:patients',
    ];
}
