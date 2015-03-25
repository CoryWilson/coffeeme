@extends('layout')

@section('content')

<div class="content">
	<div class="formhead">
		<h2>Login</h2>
	</div>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form class="login small-11 small-centered columns" role="form" method="POST" action="{{ url('/auth/login') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<input type="email" name="email" value="{{ old('email') }}" placeholder="Email" />	
		<input type="password" name="password" placeholder="Password" />
		<div class="checkbox right">
			<label>
				<input type="checkbox" name="remember"> Remember Me
			</label>
		</div>
		<button class="small-10 small-centered columns" type="submit">
			Login
		</button>
		<a class="button small-10 small-centered columns" href="{{ url('/password/email') }}">
			Forgot Your Password?
		</a>
	</form>
</div>	

@endsection