@extends('layouts/profilelayout')

@section('CSS')
	<link rel="stylesheet" href="{{URL::asset('css/account_styles.css')}}">
@endsection

@section('title')
	{{$user->name}} {{$user->surname}}
@endsection


@section('content')
	<div id="div1">
		<div id="img_div">
			<div>
				<img src="{{$user->image}}" id="userPhoto" alt="">
				<label for="uploadPhotoInput" id="updatePhotoButton">Update photo</label>
				<form action="{{URL::to('changeProfilePhoto')}}" id="uploadPhotoForm" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<input id="uploadPhotoInput" type="file" name="image">
				</form>
			</div>
		</div>

		<div id="friends_div">
			@if(count($friends)>0)
			<div id="friendsCount">Friends <span>{{count($friends)}}</span></div>
			<div id="friends">
				@foreach($friends as $friend)
					
					<div class="friend">
						@if($friend->user1_id==Session::get('user_id'))
							<img src="{{$friend->meAddedFriendData->image}}" alt="">
							<a href='id/{{$friend->user2_id}}'>{{$friend->meAddedFriendData->name}}</a>						
						@else 
							<img src="{{$friend->myAddedFriendData->image}}" alt="">
							<a href='id/{{$friend->user1_id}}'>{{$friend->myAddedFriendData->name}}</a>
						@endif

					</div>
				@endforeach	
			</div>
			@else
				<p>You have no friends</p>
			@endif
		</div>
	</div>

	<div id="div2">
		<div id="name_div">
			<div id="name_surname">
				<span>{{$user->name}} {{$user->surname}}</span>
				<span id="last_seen">last seen</span>
			</div>

			<div id="status">
				@if(!$user->user_status)
					<p>set a status message</p>
					@else
						{{$user->user_status}}
				@endif
			</div>
		</div>

		<div id="photos_div">
			<p>My photos <span>{{count($photos)}}</span></p>
			<div>
				@foreach($photos as $photo)
					<img src="{{$photo->photo}}" alt="">
				@endforeach
			</div>
		</div>

		<div id="user_feed">
			<textarea placeholder="What's new?" name="status" oninput='auto_grow(this)' id="add_status_input"></textarea>
			<button id="add_status_button">Add Status</button>
		</div>

		<div id="myStatuses">
			@foreach($statuses as $status)
			<div class="post" data-statusid="{{$status->id}}">
				<!-- friendsPost -> post -->
				<div id="postData">

					<!-- friendsPostData-> postData -->
					<img src="{{$user->image}}" alt="">
					<div>
						<p><a href="id/{{$status->user_id}}">{{$user->name}} {{$user->surname}}</a></p>
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
<script src="{{URL::asset('js/account_script.js')}}"></script>
@endsection
