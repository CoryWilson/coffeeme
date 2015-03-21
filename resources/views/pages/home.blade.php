@extends('layout')

@section('content')

	<h1>{{ $name }}</h1>
	
	@foreach ($lessons as $lesson)

		<ul>
			<li>
				<?= $lesson; ?>
			</li>
		</ul>

	@endforeach

@stop
