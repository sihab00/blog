
@extends('master')
	@section('title','| Home')
	@section('content')
		<div class="jumbotron">
		  <h1 class="display-4">Welcome to my blog</h1>
		  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
		  <hr class="my-4">
		  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
		  <p class="lead">
		    <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
		  </p>
		</div>
		<div class="row">
			<div class="col-md-8">
				@foreach($posts as $post)
				<div>
					<h3>{{ $post->title }}</h3>
					<p>{{ substr(strip_tags($post->body), 0, 200)}}{{strlen(strip_tags($post->body)) >200 ? "...":""}}</p>
		  			<a class="btn btn-primary btn-lg" href="{{ route('blog.single',$post->slug)}}" role="button">Read More</a>
				</div>
				@endforeach
			</div>
			<div class="col-md-4">
				<h3>SIDEBAR</h3>
				<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
	  			<a class="btn btn-primary btn-lg" href="#" role="button">Read More</a>
			</div>
		</div>
		@endsection
