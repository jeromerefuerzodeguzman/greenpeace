@extends('layouts.default')


@section('content')
	<div class="small-5 large-centered columns"  style="border: 1px solid #cecece; background: whitesmoke;">
		<h5>TEXT MESSAGES</h5>
		<table>
			@foreach($lists as $list)
				<tr>
					<td style="padding: 0px;">
						<a href="{{ Request::root() }}/{{ $list->conversation_ids }}">
						<ul id="ul_messages">
							<li><span style="font-weight: <?= $list->readflag==0? "900":"0"?>">{{ $list->conversation_ids }}<span></li>
							<li><p id="li_latest_message">{{ date("M j g:iA",strtotime($list->datetime)) }}</p></li>
						</ul>
						</a>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection


@section('scripts')
	
@endsection