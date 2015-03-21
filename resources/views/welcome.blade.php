<html>
	<head>
		<title>Coffee Me | Cory Wilson</title>
		<!-- start Typekit -->
		<script src="//use.typekit.net/fha4czt.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>
		<!-- end Typekit -->
		<link href="<?= asset('/css/normalize.css');?>" rel='stylesheet' type='text/css'/>
		<link href="<?= asset('/css/foundation.min.css');?>" rel='stylesheet' type='text/css'/>
		<link href="<?= asset('/css/app.css');?>" rel='stylesheet' type='text/css'/>
	</head>
	<body>
		<div class="container small-12 columns">
			<div class="content small-11 small-centered columns">
				<div class="title">
					<h1>Coffee Me</h1>
				</div>
				<div class="quote">
					{{ Inspiring::quote() }}
				</div>
			</div>
		</div>
	</body>
</html>
