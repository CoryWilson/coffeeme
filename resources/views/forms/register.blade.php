@extends('layout')

@section('content')

	<!-- <form action="/store" enctype="" method="post">
		<input type="email" name="email" placeholder="Email" value="" />
		<input type="text" name="username" placeholder="Username" value="" />
		<input type="password" name="password" placeholder="Password" value="" />
		<button type="submit">Register</button>
	</form> -->

	{!! Form::open(['url'=>'/store']) !!}

		{!! Form::email('email', '', ['placeholder' => 'Email']) !!}
		{!! Form::text('name', '', ['placeholder' => 'Username']) !!}
		{!! Form::password('password', ['placeholder' => 'Password']) !!}

		{!! Form::submit('register', ['class' => 'button']) !!}

	{!! Form::close() !!}

@stop