@extends('layouts.default')


@section('content')
	<div class="row">
		<div class="small-5 large-centered columns">
			<div class="large-12 columns"  style="border: 1px solid #cecece; background: whitesmoke;">
				<br />
				<img src="img/user.jpg" width="50px" />&nbsp;&nbsp;&nbsp;
				<span style="font-weight: bold;">{{ $phonenumber }}</span>
				<hr />
				@foreach($lists as $list)
				<p style="display: block; font-size: 14px; clear:both" class="triangle-isosceles <?= $list->to==$phonenumber? "right me":"left to"?>" >
					<span style="font-size: 11px; color: WHITE;">{{ date("M j g:iA",strtotime($list->created_at)) }}</span>
					<br />
					<span>{{ $list->message }}</span>
				</p>
				@endforeach
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	
@endsection