<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class statuses_model extends Model
{
	public $table='statuses';

	// function addedMe(){
	// 	return $this->hasMany('App\friends_model','user2_id','user_id');
	// }

	// function meAdded(){
	// 	return $this->hasMany('App\friends_model','user1_id','user_id');
	// }

	// function show_statuses(){
	// 	return $this->addedMe()->union($this->meAdded()->toBase());
	// }

	// function showUserData(){
	// 	return $this->belongsTo('App\user_model','user_id');
	// }

	function isLiked(){
		return $this->belongsTo('App\likes_model','id','post_id')->where('user_id',Session::get('user_id'));
	}

	function countOfLikes(){
		return $this->hasMany('App\likes_model','post_id','id');
		
	}
}
