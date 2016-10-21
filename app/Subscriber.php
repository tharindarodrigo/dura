<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Subscriber extends Model
{
    public static $rules = [
        'name' => 'required',
        'pin' => 'exists:agents,agent_code'
    ];


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


    /**
     * Relationships
     */

    public function agent()
    {
        return $this->belongsTo('App\Agent','pin','agent_code');
    }
    
}
