@if(Session::has('success'))
	<div class="alert alert-success">
		<strong>Success:</strong>{{Session::get('success')}}
	</div>

	@elseif(Session::has('warning'))
	<div class="alert alert-warning">
		<strong>Success:</strong>{{Session::get('warning')}}
	</div>
	
@endif

@if(count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Error:</strong>
		<ul>	
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
@endif