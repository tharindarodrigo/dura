<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Subscriber extends Model
{
    public static $rules = [
        'name' => 'required',
        'pin' => 'exists:agents,agent_code'
    ];


    /**
     * Relationships
     */

    public function agent()
    {
        return $this->belongsTo('App\Agent','pin','agent_code');
    }
    
}
