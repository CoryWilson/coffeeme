@extends('layout')

@section('content')
	
	<form action="/processRegister" method="POST" class="login small-11 small-centered columns">
		
		<input type="email" name="email" value="" placeholder="Email" />
		<input type="text" name="username" value="" placeholder="Username" />
		<input type="password" name="password" value="" placeholder="Password" />
		<button class="small-10 small-centered columns" type="submit">
			Sign Up
		</button>

	</form>

@stop