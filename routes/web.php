<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Unauthorized/login');
});

Route::get('/signup',function(){
	return view('Unauthorized/signup');
});

Route::post('/login','UnregUserController@login');
Route::post('/signup','UnregUserController@signup');
Route::get('/logout','AuthorizedUserController@logout');
Route::get('/feed','AuthorizedUserController@feed')->middleware('CheckUser');
Route::get('/my','AuthorizedUserController@ToMyProfile')->middleware('CheckUser');
Route::get('/messages','AuthorizedUserController@ToMyMessages')->middleware('CheckUser');
Route::get('/friends','AuthorizedUserController@ToMyFriends')->middleware('CheckUser');
Route::get('/statuses','AuthorizedUserController@ToMyStatuses')->middleware('CheckUser');
Route::get('/photos','AuthorizedUserController@ToMyPhotos')->middleware('CheckUser');
Route::get('/id/{userId}','AuthorizedUserController@ToUserProfile');
Route::post('/likepost','AuthorizedUserController@likePost');
Route::post('/unlikePost','AuthorizedUserController@unlikePost');
Route::post('/changeProfilePhoto','AuthorizedUserController@changeProfilePhoto');
Route::post('/addNewStatus','AuthorizedUserController@addNewStatus');
Route::post('/unfriendFromFriend','AuthorizedUserController@unfriendFromFriend');