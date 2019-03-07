@extends('master')
@section('title','| Blog')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1>Blog</h1>
			@foreach($posts as $post)
				<div>
					<h3>{{ $post->title }}</h3>
					<p>{{ substr(strip_tags($post->body), 0, 200)}}{{strlen(strip_tags($post->body)) >200 ? "...":""}}</p>
		  			<a class="btn btn-primary btn-lg" href="{{ route('blog.single',$post->slug)}}" role="button">Read More</a>
				</div>
				@endforeach
		</div>

		<div>
			{{$posts->links()}}
		</div>
	</div>
	
@endsection