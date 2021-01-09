@foreach($friends as $friend)
	
	@foreach($friend->showFriendsStatuses as $friendsStatus)
	<div class="friendsPost" data-statusid="{{$friendsStatus['id']}}">
		
		<div id="friendsPostData">
			<img src="{{$friendsStatus->showUserData['image']}}" alt="">
			<p><a href="id/{{$friendsStatus->showUserData['id']}}">{{$friendsStatus->showUserData['name']}} {{$friendsStatus->showUserData['surname']}}</a></p>
		</div>

		<div id="friendsStatus">
			{{$friendsStatus['status']}}
			<div id="statusBorder"></div>
		</div>

		<div id="statusButtons">

			<i class="fa fa-heart-o likePost" aria-hidden="true"></i>
			<i class="fa fa-commenting-o" aria-hidden="true"></i>
			<i class="fa fa-share" aria-hidden="true"></i>
		</div>
	</div>
	@endforeach

@endforeach