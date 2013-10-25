@extends('layouts.default')


@section('content')
	<div class="small-5 large-centered columns">
		<h5>{{ $phonenumber }}</h5>
		<hr />
		@foreach($lists as $list)
		<p style="font-size: 14px;" class="triangle-isosceles top" >
			<span style="font-size: 11px; color: gray;">{{ $list->created_at }}:</span>
			<br />
			<span>{{ $list->message }}</span>
		</p>
		@endforeach
	</div>
@endsection


@section('scripts')
	
@endsection