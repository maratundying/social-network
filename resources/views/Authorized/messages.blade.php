@extends('layouts/profilelayout')

@section('CSS')
	<link rel="stylesheet" href="{{URL::asset('css/messages_styles.css')}}">
@endsection

@section('title')
	{{$user->name}} {{$user->surname}} - Messages
@endsection

@section('content')
	<div id="messages_search_div">
		<input type="text" id="messages_search_input" placeholder="Search">
		<button>Search</button>
	</div>
	
@endsection