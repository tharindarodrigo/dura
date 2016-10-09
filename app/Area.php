<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public static $rules=[
        'city_id'=>'required|numeric',
        'area'=>'required',
    ];

    /**
     * Relationships
     *
     */

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
