<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subscriber;

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

    public function getSubscribers($pin)
    {
        $subscribers = Subscriber::where('pin', 'like', '%'.$pin.'%')->get();
        return $subscribers;
    }

    public function getSubscribersByAgent($from=null, $to=null, $pin='%'){
//        $subscriber = Subscriber::all();
//        if(!empty($from) && !empty($to)){
//
//        } else {
//
//        }
        $subscribers = Subscriber::where('created_on','<=', $from)
            ->where('created_on','>=', $to)
            ->where('pin',$pin)
            ->get();

        return $subscribers;

    }

    public function subscribers()
    {
        return $this->hasMany('App\Subscriber','pin','agent_code');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
