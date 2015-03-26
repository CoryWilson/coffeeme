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
			<h2>{{ $data['shopSQL']['name'] }}</h2>
		</div>

			@if (Auth::guest())

			@else
			<div class="ratefav small-11 small-centered columns">
				<form action="fav/{{$data['shopSQL']['id']}}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button id="favorite" class="small-10 small-centered columns" type="submit">
						Add {{ $data['shopSQL']['name'] }} to Favorites
					</button>
				</form>
				<form action="rate/{{$data['shopSQL']['id']}}" method="POST">
					<div class="small-11 small-centered columns">
						<h4>Rate {{ $data['shopSQL']['name'] }}:</h4>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input id="range" type="range" name="rating" min="0" max="5"/>
						<button id="rate" class="right" type="submit">Rate {{$data['shopSQL']['name']}}</button>
					</div>
				</form>
				<!-- <form action="favDrink/{{$data['shopSQL']['id']}}" method="POST">
					<div class="favdrink small-11 small-centered columns">
						<h4>Pick Your Favorite Drink:</h4>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<select name="fav_drink" id="">
							<option value="Cold Brew">Cold Brew</option>
							<option value="Pour Over">Pour Over</option>
							<option value="Americano">Americano</option>
							<option value="Cappuccino">Cappuccino</option>
							<option value="Latte">Latte</option>
						</select>
					</div>
				</form> -->
			</div>
			@endif


		<div class="entry row small-11 small-centered columns">
			<p>Address: {{ $data['shopSQL']['street_address'] }}, {{ $data['shopSQL']['locality'] }}, {{ $data['shopSQL']['region'] }}, {{ $data['shopSQL']['postal_code'] }}</p>
			<p>Phone: <a href="tel:{{ $data['shopSQL']['phone'] }}">{{ $data['shopSQL']['phone'] }}</a></p>
			<p>Website: <a href="{{ $data['shopSQL']['website_url'] }}">{{ $data['shopSQL']['website_url'] }}</a></p>
			<p>Rating: {{ $data['rating'] }} </p>
<!-- 			<p>Favorite Drink: $data['shopSQL']['favorite_drink']</p>
 -->		</div>
	</div>
	
@stop

@section('moreJS')
	<script>
		function initialize() {
			var lat = {{ $data['shopMDB']['lat'] }};
			var lng = {{ $data['shopMDB']['long'] }};
			var mapOptions = {
			  center: { lat: lat, lng: lng},
			  zoom: 18,
			  mapTypeId: 'satellite'
			};
			var map = new google.maps.Map(document.getElementById('map-canvas'),
			    mapOptions);

			var myLatlng = new google.maps.LatLng(lat,lng);

			var contentString = '<div id="content">'+
			      '<div id="siteNotice">'+
			      '</div>'+
			      '<h1 id="firstHeading" class="firstHeading">{{$data["shopSQL"]["name"]}}</h1>'+
			      '<div id="bodyContent">'+
			      '<p>Rating: {{$data["rating"]}}</p>'+
			      '</div>'+
			      '</div>';

			  var infowindow = new google.maps.InfoWindow({
			      content: contentString
			  });

			var marker = new google.maps.Marker({
			    position: myLatlng,
			    map: map,
			    title:"{{ $data['shopSQL']['name'] }}"
			});
			map.setTilt(45);
			marker.setMap(map);

			google.maps.event.addListener(marker, 'click', function() {
		    infowindow.open(map,marker);
		  
		 });

		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
@stop
