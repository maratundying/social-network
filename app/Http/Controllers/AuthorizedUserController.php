<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_model;
use App\statuses_model;
use App\friends_model;
use App\likes_model;
use App\photos_model;
use App\friends_requests;
use Illuminate\Support\Facades\DB;
use Session;

class AuthorizedUserController extends Controller
{
   

    function feed(){
      $friends=friends_model::all();
    	$user=user_model::where('id',Session::get('user_id'))->first();
      $statuses1=statuses_model::select('statuses.id','statuses.user_id','statuses.status','statuses.created_at','user.name','user.surname','user.image')
        ->whereIn('user_id', function($query)
        {
            $query->select(DB::raw('user2_id'))
                  ->from('friends')
                  ->where('user1_id' ,Session::get('user_id'));
        })->join('user','statuses.user_id','user.id')->get();
      
        $statuses2=statuses_model::select('statuses.id','statuses.user_id','statuses.status','statuses.created_at','user.name','user.surname','user.image')
        ->whereIn('user_id', function($query)
        {
            $query->select(DB::raw('user1_id'))
                  ->from('friends')
                  ->where('friends.user2_id',Session::get('user_id'));
        })->join('user','statuses.user_id','user.id')->get();
        $statuses=$statuses1->merge($statuses2);
    	return view('Authorized/newsfeed',compact('user','friends','statuses'));
    }

    function ToMyProfile(){
    	$statuses=statuses_model::where('user_id',Session::get('user_id'))->orderBy('created_at','desc')->get();
      $photos=photos_model::where('user_id',Session::get('user_id'))->get();
    	$user=user_model::where('id',Session::get('user_id'))->first();
      $friends=friends_model::where('user1_id',Session::get('user_id'))->orWhere('user2_id',Session::get('user_id'))->inRandomOrder()->limit(6)->get();
    	return view('Authorized/myprofile',compact('user','statuses','photos','friends'));
    }

    function ToMyMessages(){
    	$user=user_model::where('id',Session::get('user_id'))->first();
    	return view('Authorized/messages',compact('user'));
    }

    function ToMyFriends(){
    	$user=user_model::where('id',Session::get('user_id'))->first();
      $friends=friends_model::where('user1_id',Session::get('user_id'))->orWhere('user2_id',Session::get('user_id'))->get();
    	return view('Authorized/friends',compact('user','friends'));	
    }

    function unfriendFromFriend(Request $data){
      $friend_id=+$data->user_id;
      $fr=friends_model::where(function($query) use ($friend_id){
        return $query->where('user1_id',$friend_id)->where('user2_id',Session::get('user_id'));
      })->orWhere(function($query) use ($friend_id){
        return $query->where('user2_id',$friend_id)->where('user1_id',Session::get('user_id'));
      })->delete();
      return $fr;
    }

    function sendFriendRequest(Request $data){
      $request = new friends_requests;
      $request->user1_id=Session::get('user_id');
      $request->user2_id=$data->userId;
      $request->save();
      return $request;
    }

    function cancelFriendRequest(Request $data){
      friends_requests::where('id',+$data->request_id)->delete();
    }

   	function ToMyStatuses(){
      $statuses=statuses_model::select('statuses.id','statuses.user_id','statuses.status','statuses.created_at','user.name','user.surname','user.image')->where('user_id',Session::get('user_id'))->join('user','statuses.user_id','user.id')->get();
   		$user=user_model::where('id',Session::get('user_id'))->first();
    	return view('Authorized/statuses',compact('user','statuses'));
   	}

   	function ToMyPhotos(){
   		$user=user_model::where('id',Session::get('user_id'))->first();
    	return view('Authorized/photos',compact('user'));
   	}

    function ToUserProfile($userId){
      if($userId!=Session::get('user_id')){
        
        $user_data=user_model::where('id',$userId)->get();
        
        $user_friends=friends_model::where('user1_id',$userId)->orWhere('user2_id',$userId)->inRandomOrder()->limit(6)->get();
        $user_photos=photos_model::where('user_id',$userId)->get();
        
        $user_photos_limited=photos_model::where('user_id',$userId)->inRandomOrder()->limit(4)->get();
        
        $user_statuses=statuses_model::where('user_id',$userId)->orderBy('created_at','desc')->get();
        

        $fr=friends_model::where(function($query) use ($userId){
          return $query->where('user1_id',$userId)->where('user2_id',Session::get('user_id'));
        })->orWhere(function($query) use ($userId){
          return $query->where('user2_id',$userId)->where('user1_id',Session::get('user_id'));
        })->first();
        if(!empty($fr)){
          $isFriend='true';
        }
        else{
          $isFriend='false';
        }

        $req=friends_requests::where(function($query) use ($userId){
          return $query->where('user1_id',Session::get('user_id'))->where('user2_id',$userId);
        })->orWhere(function($query) use ($userId){
          return $query->where('user2_id',Session::get('user_id'))->where('user1_id',$userId);
        })->first();

        if(!empty($req)){
          $request=$req;
          if($request->user1_id==Session::get('user_id')){
            $request->sender='me';
          }
          else{
            $request->sender='notme';
          }

        }

        else{
          $request='false';
        }

        return view('Authorized/userprofile',compact('user_data','user_friends','user_photos','user_photos_limited','user_statuses','isFriend','request'));
      }
      else{
        return redirect('/my');
      }
    }

    function changeProfilePhoto(Request $data){
        $data->validate([
          'image' => 'mimes:jpeg,png,jpg,bmp',
        ]);
      if($files=$data->file('image')){
              $photo=new photos_model;
              $name=uniqid().$files->getClientOriginalName();
              $files->move('images/photos',$name);
              $photo_name='images/photos/'.$name;
              $photo->photo=$photo_name;
              $photo->user_id=Session::get('user_id');
              $photo->save();
              user_model::where('id',Session::get('user_id'))->update(['image'=>$photo_name]);
              return back();
      }
    }

    function addNewStatus(Request $data){
      $status=$data->input_status;

      $new_status=new statuses_model;
      $new_status->user_id=Session::get('user_id');
      $new_status->status=$status;
      $new_status->save();
      return $new_status;
    }

    function likePost(Request $data){
      $post_id=$data['post_id'];
      $like=new likes_model;
      $like->post_id=$post_id;
      $like->user_id=Session::get('user_id');
      $like->save();
    }

    function unlikePost(Request $data){
      $post_id=$data['post_id'];
      likes_model::where('user_id',Session::get('user_id'))->where('post_id',$post_id)->delete();
    }

    function logout(){
    	Session::flush();
    	return redirect('/');
    }
}