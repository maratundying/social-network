@extends('layouts/profilelayout')

@section('CSS')
	<link rel="stylesheet" href="{{URL::asset('css/statuses_styles.css')}}">	
@endsection

@section('title')
	{{$user->name}} {{$user->surname}} - Statuses
@endsection

@section('content')

	@foreach($statuses as $status)
	<div class="post" data-statusid="{{$status->id}}">
		<!-- friendsPost -> post -->
		<div id="postData">

			<!-- friendsPostData-> postData -->
			<img src="{{$status->image}}" alt="">
			<div>
				<p><a href="id/{{$status->user_id}}">{{$status->name}} {{$status->surname}}</a></p>
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

@endsection

