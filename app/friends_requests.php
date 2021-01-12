<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friends_requests extends Model
{
    public $table='friends_requests';

    function showUserData(){
    	return $this->belongsTo('App\user_model','user1_id');
    }
}
