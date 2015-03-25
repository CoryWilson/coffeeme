@extends('layout')

@section('content')
	
	<nav class="top-bar" data-topbar role="navigation">
		<ul>	
			<li>
				<h1 class="title">
					<a href="/">Coffee Me</a>
				</h1>
			</li>
			
		</ul>
	</nav>	

	<form action="/processLogin" method="POST" class="login small-11 small-centered columns">
		
		<input type="text" name="username" value="" placeholder="Username" />
		<input type="password" name="password" value="" placeholder="Password" />
		<button class="small-10 small-centered columns" type="submit">
			Log In
		</button>

	</form>

@stop