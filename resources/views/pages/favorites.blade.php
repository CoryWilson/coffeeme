@extends('layout')

@section('content')
	<div class="content">
		<div class="heading">
			<h2> {{ \Auth::user()->name }}'s Favorite Coffee Shops</h2>
		</div>

		@for($i = 0; $i < count($favorites); $i++)
			<div class="entry row small-11 small-centered columns">
				<h3><a href="/shop/{{$favorites[$i]->id}}">{{ $favorites[$i]->name }}</a></h3>
				<p>Phone: <a href="tel:{{ $favorites[$i]->phone }}">{{ $favorites[$i]->phone }}</a></p>
				<p>Website: <a href="{{ $favorites[$i]->website_url }}">{{ $favorites[$i]->website_url }}</a></p>
				<!-- <p>Rating: *Pull From MongoDB*</p>
				<p>Favorite Drink: *Pull From MongoDB*</p> -->
			</div>
		@endfor
	</div>
@stop
