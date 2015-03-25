@extends('layout')

@section('content')
	<div id="map-canvas" class="small-12 small-centered columns" style="width: 100%; height: 450px"></div>

	<div class="content">
		<div class="heading">
			<h2> {{ \Auth::user()->name }}'s Favorite Coffee Shops</h2>
		</div>
		@foreach($shops as $shop)
			<div class="entry row small-11 small-centered columns">
				<h3><a href="/shop/{{$shop['name']}}">{{ $shop['name'] }}</a></h3>
				<p>Address: {{ $shop['street_address'] }}, {{ $shop['locality'] }}, {{ $shop['region'] }}, {{ $shop['postal_code'] }}</p>
				<p>Phone: <a href="tel:{{ $shop['phone'] }}">{{ $shop['phone'] }}</a></p>
				<p>Website: <a href="{{ $shop['website_url'] }}">{{ $shop['website_url'] }}</a></p>
				<p>Rating: *Pull From MongoDB*</p>
				<p>Favorite Drink: *Pull From MongoDB*</p>
			</div>
		@endforeach
	</div>
@stop

@section('moreJS')
	<script>
		function initialize() {
			var lat = {{ $coordinates['lat'] }};
			var lng = {{ $coordinates['lng'] }};
			var mapOptions = {
			  center: { lat: lat, lng: lng},
			  zoom: 13
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
