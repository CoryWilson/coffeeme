@extends('layout')

@section('content')	
	<nav class="top-bar" data-topbar role="navigation">
		<a href="/favorites" class="button left">Favorites</a>
		<a href="/"><h1>{{ $name }}</h1></a>
		<a href="/login" class="button right">Log In</a>
	</nav>	
	
		
	<div id="map-canvas" class="small-12 small-centered columns" style="width: 100%; height: 450px"></div>

	<div class="content">
		<h2>Local Coffee Shops</h2>
		@foreach($shops as $shop)
			<div class="entry row small-11 small-centered columns">
				<h3>{{ $shop['name'] }}</h3>
				<p>Address: {{ $shop['street_address'] }}, {{ $shop['locality'] }}, {{ $shop['region'] }}, {{ $shop['postal_code'] }}</p>
				<p>Phone #: <a href="tel:{{ $shop['phone'] }}">{{ $shop['phone'] }}</p>
				<p>Website: <a href="{{ $shop['website_url'] }}">{{ $shop['website_url'] }}</a></p>
				<p>Rating: *Pull From MongoDB*</p>
				<p>Favorite Drink: *Pull From MongoDB*</p>
			</div>
		@endforeach
	</div>

@stop
