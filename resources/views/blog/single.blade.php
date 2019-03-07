@extends('master');
@section('title',"| $post->title")

@section('content')
	<div class="col-md-12">
		<img src="{{ asset('image/'. $post->image)}}" class="img-fluid">
		<h1>{{ $post->title }}</h1>
		<p>{{ $post->body}}</p>
	</div>
	
	<p>Post In:{{$post->category->name}}</p>

	<div class="row">
		
		<div class="col-md-8 offset-md-2">
		<h4 class="mb-3"><small class="pr-1">{{ $post->comments()->count() }}</small>Comments</h4>
			@foreach($post->comments as $comment)
				<div class="mb-5">
					<p><strong>Name:</strong> {{ $comment->name }}</p>
					<p><strong> Comment:</strong> {{ $comment->comment }}</p>
				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 offset-md-2">
			{{ Form::open(['route'=>['comments.store',$post->id],'data-parsley-validate'=>'']) }}
				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', 'Name:') }}
						{{ Form::text('name',null,['class'=>'form-control','required'=>'']) }}	
					</div>
					<div class="col-md-6">
						{{ Form::label('email', 'Email:') }}
						{{ Form::text('email',null,['class'=>'form-control','required'=>'']) }}
					</div>
				</div>
				{{ Form::label('comment', 'Comment:') }}
				{{ Form::textarea('comment',null,['class'=>'form-control','required'=>''])}}

				{{ Form::submit('Add Comment',['class'=>'btn btn-success btn-lg mt-2'])}}

					

			{{ Form::close() }}
		</div>
	</div>
@endsection

