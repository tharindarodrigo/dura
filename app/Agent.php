<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public static $rules = ['name' => 'required'];


    public static function generateAgentCode()
    {

        if (!Agent::first()) {
            $count = 10000;
        } else {
            $count = Agent::max('agent_code');
            $count++;
        }

        return $count;

    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
