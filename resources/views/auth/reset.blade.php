@extends('layout')

@section('content')
<div class="content">
	<div class="formhead">
		<h2>Reset Password</h2>
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

	<form class="login small-11 small-centered columns" role="form" method="POST" action="{{ url('/password/reset') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="token" value="{{ $token }}">

		<input type="email" name="email" value="{{ old('email') }}" placeholder="Email" />
		<input type="password" name="password" placeholder="Password" />
		<input type="password" name="password_confirmation" placeholder="Confirm Password" />
		<button class="small-10 small-centered columns" type="submit">
			Reset Password
		</button>
	</form>
</div>
@endsection
