@extends('master')

@section('title', "| $tag->name Tag")

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-6">
					<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block">Edit</a>
				</div>
				<div class="col-md-6">
					{{ Form::open(['route'=>['tags.destroy',$tag->id], 'method'=>'DELETE']) }}
						{{ Form::submit('Delete',['class'=>'btn btn-danger btn-block'])}}
					{{ Form::close() }}
				</div>
				<div class="col-md-12">
					<a href="{{ route('tags.index', $tag->id) }}" class="btn btn-primary btn-block mt-2">Back</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Posts</th>
						<th>Tag</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tag->posts as $post)
						<tr>
							<th>{{ $post->id}}</th>
							<td>{{ $post->title }}</td>
							<td>
								@foreach($post->tags as $tag)
									<span class="badge badge-secondary">{{ $tag->name }}</span>
								@endforeach
							</td>
							<td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-secondary">View</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection