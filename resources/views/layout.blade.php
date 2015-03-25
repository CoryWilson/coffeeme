<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<!-- start Typekit -->
	<script src="//use.typekit.net/fha4czt.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	<!-- end Typekit -->
	<link href="<?= asset('/css/normalize.css');?>" rel='stylesheet' type='text/css'/>
	<link href="<?= asset('/css/foundation.min.css');?>" rel='stylesheet' type='text/css'/>
	<link href="<?= asset('/css/app.css');?>" rel='stylesheet' type='text/css'/>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	
	@yield('header')
	
	<nav class="top-bar" data-topbar role="navigation">
		<ul>
			<li class="favorites left">
				<a href="{{ url('/favorites') }}">
					Favorites
				</a>
			</li>
			@if (Auth::guest())
				<li class="login right">
					<a href="{{ url('/auth/login') }}">
						Login
					</a>
				</li>
			@else
				<li class="login right">
					<a href="{{ url('/auth/logout') }}">
						Logout
					</a>
				</li>
			@endif
			<li>
				<h1 class="title">
					<a href="{{ url('/') }}">Coffee Me</a>
				</h1>
			</li>
		</ul>
	</nav>	

	@yield('content')

	@yield('footer')

	<!-- Scripts -->
	<script type="text/javascript" src="<?= asset('/js/jquery-1.11.2.min.js');?>"></script>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?= asset('/js/foundation.min.js');?>"></script>
	<script type="text/javascript" src="<?= asset('/js/geolocation.js');?>"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAA-kqhnli_fFFLNUVitAMOBMANWvn6vgw"></script>
	
	@yield('moreJS')

</body>
</html>
