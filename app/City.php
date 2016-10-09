<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public static $rules = ['city'=>'required'];


    /**
     * Relationships
     */

    public function areas()
    {
        return $this->hasMany('App\Areas');
    }
}
