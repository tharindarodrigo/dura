<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public static $rules = ['name'=>'required'];


    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
