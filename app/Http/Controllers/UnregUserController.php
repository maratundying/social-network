<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\user_model;
use Hash;
use Session;


class UnregUserController extends Controller
{
	function login(Request $data){
		$data->validate([
			'login'=>'required',
			'password'=>'required'
		]);
		$input_login=$data->login;
		$input_password=$data->password;
		$user=user_model::where('email',$input_login)->first();
		if(!$user){
			return redirect()->back()->with('login_error','User not found!');
		}

		else{
			if(!Hash::check($input_password,$user->password)){
				return redirect()->back()->with('login_error','Wrong password!');
			}

			else if($user->registered==0){
				return redirect()->back()->with('login_error','Account is not verified!');
			}

			else{
				Session::put('user_id',$user->id);
				return redirect('/feed');
			}
		}
	}

	function signup(Request $data){
		$data->validate([
			'name'=>'required|alpha|max:12',
			'surname'=>'required|alpha|max:16',
			'email'=>'required|email',
			'password'=>'required|min:6,required_with:password_confirmation|same:password_confirmation',
			'password_confirmation'=>'required'
		]);

		$user=new user_model;
		$user->name=$data->name;
		$user->surname=$data->surname;
		$user->email=$data->email;
        $user->password=Hash::make($data->password);
		$user->save();
		return redirect('/')->with('confirmation_message_sent','Confirm email adress!');
	}
}
