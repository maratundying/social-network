@extends('layouts/profilelayout')

@section('CSS')
	<link rel="stylesheet" href="{{URL::asset('css/friends_styles.css')}}">
@endsection

@section('title')
	{{$user->name}} {{$user->surname}} - Friends
@endsection

@section('content')
	@if(count($friends)>0)
	<div id="myFriends">
	<div id="friendsDivHeader">
		<p>All friends <span>{{count($friends)}}</span></p>
	</div>
		<input type="text" id="friendsSearch" placeholder="Search">
		@foreach($friends as $friend)
			@if($friend->user1_id==Session::get('user_id'))
			<div class="friend" data-userid='{{$friend->user2_id}}'>
				<div id="friendsData">
						<img src="{{$friend->meAddedFriendData->image}}" alt="">
						<div>
							<a href='id/{{$friend->user2_id}}'>{{$friend->meAddedFriendData->name}} {{$friend->meAddedFriendData->surname}}</a>			
							<a href="">Write message</a>
						</div>

					@else 
					<div class="friend" data-userid='{{$friend->user1_id}}'>
				<div id="friendsData">
						<img src="{{$friend->myAddedFriendData->image}}" alt="">
						<div>
							<a href='id/{{$friend->user1_id}}'>{{$friend->myAddedFriendData->name}} {{$friend->myAddedFriendData->surname}}</a>
							<a href="">Write message</a>
						</div>
					@endif
				</div>
				<div class="friendsActionButtons">
					<p id="unfriendButton">Unfriend</p>
				</div>
			</div>			
		@endforeach
	</div>
	@endif
@endsection

@section('script')
	<script src="{{URL::asset('js/friends_scripts.js')}}"></script>
@endsection