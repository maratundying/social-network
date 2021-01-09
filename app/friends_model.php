<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friends_model extends Model
{
    //
    public $table='friends';

    function meAddedFriendData(){
        return $this->belongsTo('App\user_model','user2_id','id');
    }

    function myAddedFriendData(){
        return $this->belongsTo('App\user_model','user1_id','id');
    }
}
