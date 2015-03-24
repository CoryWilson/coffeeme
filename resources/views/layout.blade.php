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
	<div class="container small-11 small-centered columns">
	
	@yield('header')

	@yield('content')

	@yield('footer')

	</div>
	<!-- Scripts -->
	<script type="text/javascript" src="<?= asset('/js/modernizr.js');?>"></script>
	<script type="text/javascript" src="<?= asset('/js/jquery-1.11.2.min.js');?>"></script>
	<script type="text/javascript" src="<?= asset('/js/foundation.min.js');?>"></script>
	<script type="text/javascript" src="<?= asset('/js/geolocation.js');?>"></script>
</body>
</html>
