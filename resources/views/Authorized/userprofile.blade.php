@extends('layouts/profilelayout')

@section('CSS')
	<link rel="stylesheet" href="{{URL::asset('css/user_profile_styles.css')}}">
@endsection

@section('title')
	{{$user_data[0]->name}} {{$user_data[0]->surname}}
@endsection


@section('content')
	<div id="div1" >
		<div id="img_div">
			<div>
				<img src="../{{$user_data[0]->image}}" id="userPhoto" alt="">
			</div>
		</div>

		<div id="users_contact_div" data-userId='{{$user_data[0]->id}}'>
				<div id="friendOrUnfriend">
				@if($isFriend=='true')
					<button id="unfriend">Unfriend</button>
					<div>
						<p id="unfriendButton">Unfriend</p>
						<p>Cancel</p>
					</div>
					@else
						@if($request=='false')
						<button id="addFriendButton">Add friend</button>
						@else
							<p data-data='{{$request->id}}' class="cancelFriendRequest">Cancel friend request</p>
						@endif
				@endif
				</div>
		</div>

		<div id="friends_div">
			@if(count($user_friends)>0)
			<div id="friendsCount">Friends <span>{{count($user_friends)}}</span></div>
			<div id="friends">
				@foreach($user_friends as $friend)
					<div class="friend">
						@if($friend->user1_id==$user_data[0]->id)
							<img src="../{{$friend->meAddedFriendData->image}}" alt="">
							<a href='../id/{{$friend->user2_id}}'>{{$friend->meAddedFriendData->name}}</a>						
						@else 
							<img src="../{{$friend->myAddedFriendData->image}}" alt="">
							<a href='../id/{{$friend->user1_id}}'>{{$friend->myAddedFriendData->name}}</a>
						@endif

					</div>
				@endforeach	
			</div>
			@else
				<p>User have no friends</p>
			@endif
		</div>
	</div>

	<div id="div2">
		<div id="name_div">
			<div id="name_surname">
				<span>{{$user_data[0]->name}} {{$user_data[0]->surname}}</span>
				<span id="last_seen">last seen</span>
			</div>

			<div id="status">
				@if($user_data[0]->user_status)
					{{$user_data[0]->user_status}}
				@endif
			</div>
		</div>

		<div id="photos_div">
			<p>{{$user_data[0]->name}}'s photos <span>{{count($user_photos)}}</span></p>
			@if(count($user_photos)>0)
			<div>
				@foreach($user_photos_limited as $photo)
					<img src="{{$photo->photo}}" alt="">
				@endforeach
			</div>
			@endif
				<p>User have no photo</p>
		</div>

		<div id="userStatuses">
			@foreach($user_statuses as $status)
			<div class="post" data-statusid="{{$status->id}}">
				<!-- friendsPost -> post -->
				<div id="postData">

					<!-- friendsPostData-> postData -->
					<img src="../{{$user_data[0]->image}}" alt="">
					<div>
						<p><a href="id/{{$status->user_id}}">{{$user_data[0]->name}} {{$user_data[0]->surname}}</a></p>
						<p>{{date("F j Y g:i a", strtotime($status->created_at))}}</p>
					</div>
				</div>

				<div id="userStatus">
					<!-- status field -->
					<!-- friendsStatus->userStatus -->
					{{$status->status}}
					<div id="statusBorder"></div>
				</div>

				<div id="statusButtons">
					@if(!$status->isLiked)
					<i class="fa fa-heart-o likePost" aria-hidden="true"></i>

					@else
						<i class="fa fa-heart unlikePost" aria-hidden="true"></i>
					@endif
					<span id='countOfLikes'>
					@if(count($status->countOfLikes)!=0)
						{{count($status->countOfLikes)}}
					@endif
					</span>
					<i class="fa fa-commenting-o" aria-hidden="true"></i>
					<i class="fa fa-share" aria-hidden="true"></i>
				</div>
			</div>
		@endforeach
		</div>
		</div>

	</div>
@endsection

@section('script')
	<script src="{{URL::asset('js/user_profile_scripts.js')}}"></script>
@endsection