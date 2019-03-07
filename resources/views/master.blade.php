<!DOCTYPE html>
<html>
	@include('partials._head')
<body>
	<div class="container">
		@include('partials._nav')
		@include('partials._messages')
	
		@if(Auth::check() ? "login" : "logout")
		@endif
		@yield('content')
		<div>
			<p class="text-center">Copy right at Nishad: All right reserved</p>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	{{Html::script('js/parsley.min.js')}}
	{{Html::script('js/select2.min.js')}}
	@yield('script')
	
</body>
</html>

