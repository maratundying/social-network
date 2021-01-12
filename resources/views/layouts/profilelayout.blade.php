<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">
	<link rel="icon" href="https://cdn.worldvectorlogo.com/logos/armenia-15027.svg">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@yield('CSS')
	<title>@yield('title')</title>
</head>
<body>
	<div id="header">
		<div id="logo"><a href="/feed"><img src="https://cdn.worldvectorlogo.com/logos/armenia-15027.svg" width="30" height="30" alt=""></a></div>
		<div id="search">
			<div id="search_div">
				<i class="fa fa-search" aria-hidden="true"></i><input type="text" placeholder="Search">
			</div>
			<span><i id="notificationIcon" class="fa fa-bell-o" aria-hidden="true"></i></span>
		</div>
		<div id="header_data"><div><img src="../{{$user_data['image']}}" alt=""><span>{{$user_data['name']}}</span><a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></div></div>
	</div>

	<div id="body">
		<div id="menu">
			<ul>
				<a href="/my"><i class="fa fa-user-circle-o" aria-hidden="true"></i></i>My profile</a>
				<a href="/feed"><i class="fa fa-list-alt" aria-hidden="true"></i>News</a>
				<a href="/messages"><i class="fa fa-comment-o" aria-hidden="true"></i>Messenger</a>
				<a href="/friends"><i class="fa fa-users" aria-hidden="true"></i>Friends</a>
				<a href="/photos"><i class="fa fa-picture-o" aria-hidden="true"></i>Photos</a>
				<a href="/statuses"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>My statuses</a>

			</ul>
		</div>
		<div id="content">
		@yield('content')
		</div>
	</div>
</body>
@yield('script')
<script src="{{URl::asset('js/script.js')}}"></script>
</html>