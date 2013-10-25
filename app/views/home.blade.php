@extends('layouts.default')


@section('content')
	<div class="small-5 large-centered columns"  style="border: 1px solid whitesmoke; background: whitesmoke;">
		<h5>TEXT MESSAGES</h5>
		<table  width="370px" style="border-color: none;">
			@foreach($lists as $list)
				<tr>
					<td style="padding: 0px;">
						<a href="{{ Request::root() }}/{{ $list->phonenumber }}">
						<ul id="ul_messages">
							<li><span style="font-weight: bold">{{ $list->phonenumber }}<span></li>
							<li><p id="li_latest_message">{{ $list->created_at }}: <br />{{ $list->message }}</p></li>
						</ul>
						</a>
					</td>
				</tr>
			@endforeach
		<table>
	</div>
@endsection


@section('scripts')
	
@endsection