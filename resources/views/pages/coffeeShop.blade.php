@extends('layout')

@section('content')
		
	<div id="map-canvas" class="small-12 small-centered columns" style="width: 100%; height: 450px"></div>

	<div class="content">

		@if (Auth::guest())
			<div class="cta">
				<h3>Get The Most Out Of Coffee Me!</h3>
				<a href="{{ url('/auth/register') }}" class="button small-11 small-centered columns">
					Sign Up
				</a>
			</div>
		@endif

		<div class="heading">
			<h2>{{ $shop['name'] }}</h2>
		</div>

		

		
		
			
			@if (Auth::guest())

			@else
			<div class="ratefav small-11 small-centered columns">
				<form action="/rateShop" method="POST">
					<div class="rate small-12 small-centered columns">
						<h4>Rate {{ $shop['name'] }}:</h4>
						<input type="range" name="rating" min="0" max="10"/>
					</div>
				</form>
				<form action="/favShop" method="POST">
					<div class="favorite small-12 small-centered columns">
						<h4>Add {{ $shop['name'] }} to Favorites:</h4>
						<input type="radio" name="fav_shop" value="favorite" >
					</div>
				</form>
				<form action="/favDrink" method="POST">
					<div class="favdrink small-12 small-centered columns">
						<h4>Pick Your Favorite Drink:</h4>
						<select name="fav_drink" id="">
							<option value="Cold Brew">Cold Brew</option>
							<option value="Pour Over">Pour Over</option>
							<option value="Americano">Americano</option>
							<option value="Cappuccino">Cappuccino</option>
							<option value="Latte">Latte</option>
						</select>
					</div>
				</form>
			</div>
			@endif


		<div class="entry row small-11 small-centered columns">
			<p>Address: {{ $shop['street_address'] }}, {{ $shop['locality'] }}, {{ $shop['region'] }}, {{ $shop['postal_code'] }}</p>
			<p>Phone: <a href="tel:{{ $shop['phone'] }}">{{ $shop['phone'] }}</a></p>
			<p>Website: <a href="{{ $shop['website_url'] }}">{{ $shop['website_url'] }}</a></p>
			<p>Rating: $shop['rating'] </p>
			<p>Favorite Drink: $shop['favorite_drink']</p>
		</div>
	</div>
	
@stop

@section('moreJS')
	<script>
		function initialize() {
			var lat = 28.5928987;
			var lng = -81.305375;
			var mapOptions = {
			  center: { lat: lat, lng: lng},
			  zoom: 12
			};
			var map = new google.maps.Map(document.getElementById('map-canvas'),
			    mapOptions);

			var myLatlng = new google.maps.LatLng(lat,lng);

			var marker = new google.maps.Marker({
			    position: myLatlng,
			    map: map,
			    title:"Hello World!"
			});
			
			marker.setMap(map);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
@stop
