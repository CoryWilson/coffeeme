@extends('layout')

@section('content')

	<form action="/route" enctype="" method="post">
		<input type="email" name="email" placeholder="Email" value="" />
		<input type="text" name="username" placeholder="Username" value="" />
		<input type="password" name="password" placeholder="Password" value="" />
		<button type="submit">Register</button>
	</form>

@stop