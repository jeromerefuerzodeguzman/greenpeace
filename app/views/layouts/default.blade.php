<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>GREENPEACE</title>
		{{ HTML::style('css/normalize.css') }}
		{{ HTML::style('css/foundation.css') }}
		{{ HTML::style('css/bubbles.css') }}
		{{ HTML::style('css/main.css') }}
		{{ HTML::style('css/datepicker.css') }}
		{{ HTML::script('js/vendor/custom.modernizr.js') }}
	</head>
	<body>
		<div id="content" >
			<nav class="top-bar" style="background: #66cc00">
				<ul class="title-area">
				    <li class="name">
				      	<h1><a href="{{ Request::root() }}"><img src="img/logo.gif" /></a></h1>
				    </li>
    				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			  	</ul>
			</nav>
			<div class="row">
				<div class="large-12 columns main-content">
					@yield('content')
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<hr>
					<h6><small>Copyright 2013 Northstar Solutions Inc.</small></h6>
				</div>
			</div>
		</div>
		
		<!-- Check for Zepto support, load jQuery if necessary -->
		<script>

		  document.write('<script src={{ URL::to('/') }}/js/vendor/'
		    + ('__proto__' in {} ? 'zepto' : 'jquery')
		    + '.js><\/script>');
		</script>
		{{ HTML::script('js/vendor/jquery.js') }}
		{{ HTML::script('js/foundation.min.js') }}
		{{ HTML::script('js/datepicker/datepicker.js') }}
		<script>
			$(function(){
			    $(document).foundation();    
			})
		</script>

		<div id="alerts">
			@if(Session::has('message'))
				<div class="alert-box success">
					{{ Session::get('message') }}
					<a href="" class="close">&times;</a>
				</div>
			@elseif(Session::has('error'))
				<div class="alert-box alert">
					{{ Session::get('error') }}
					<a href="" class="close">&times;</a>
				</div>
			@endif

			@if($errors->has())
				<script type="text/javascript">

				@foreach(Session::get('error_index') as $key => $value)
				if($("input[name='{{ $key }}']").length){
					var form = $("input[name='{{ $key }}']").addClass("error").after('<small class="error">{{ $errors->first($key) }}</small>').parents('form:first');
				} else if($("select[name='{{ $key }}']").length) {
					var form = $("select[name='{{ $key }}']").addClass("error").after('<small class="error">{{ $errors->first($key) }}</small>').parents('form:first');
				} else if($("textarea[name='{{ $key }}']").length) {
					var form = $("textarea[name='{{ $key }}']").addClass("error").after('<small class="error">{{ $errors->first($key) }}</small>').parents('form:first');
				}
				@endforeach

				@if(Session::has('form'))
				$("#{{ Session::get('form') }}").reveal();
				@else
				var parent = form.parent();
				if(parent.attr('id').indexOf("modal") !== -1) {
					parent.foundation('reveal', 'open');
				}
			@endif
			</script>
			@endif
		</div>
		@yield('scripts')
		
	</body>
</html>