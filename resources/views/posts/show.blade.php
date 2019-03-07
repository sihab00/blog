@extends('master')

@section('title','| Show Post')
@section('content')
	<div class="row">
		<div class="col-md-8">
			<img src="{{ asset('image/'. $post->image)}}" width="800" height="400" class="img-fluid">
			<h1>{{ $post->title }}</h1>
			<p>{!! $post->body !!}</p>
			<hr>
			<div class="tags">
				@foreach($post->tags as $tag)
					<span class="badge badge-secondary">{{ $tag->name}}</span>
				@endforeach
			</div>

			<div class="mt-5">
				<h1>Comments <small>{{ $post->comments->count()}} Total</small></h1>

				<div>
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Comment</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($post->comments as $comment)
							<tr>
								<td>{{ $comment->name }}</td>
								<td>{{ $comment->email }}</td>
								<td>{{ $comment->comment }}</td>
								<td>
									<a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-primary">Edit</a>
									{!! Form::open(['route'=>['comments.destroy',$post->id],'method'=>'DELETE']) !!}

										{{ Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'confirm("Are you sure!")']) }}

									{!! Form::close() !!}

									
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card bg-light">
				<div class="card-body">
					<label><strong>Url:</strong></label>
					<p><a href="{{ url('blog', $post->slug)}}">{{ url('blog',$post->slug) }}</a></p>
	
					<label><strong>Category:</strong></label>
					<p>{{ $post->category->name }}</p>
		
					<label><strong>Cteate At:</strong></label>
					<p>{{ date('M j Y h:ia', strtotime($post->created_at))}}</p>
		
					<label><strong>Last Updated:</strong></label>
					<p>{{ date('M j Y h:ia', strtotime($post->updated_at))}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					{!! Html::linkRoute('posts.edit','Edit', array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
				</div>
				<div class="col-md-6">
				{!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}

				{{ Form::submit('Delete',['class'=>'btn btn-danger btn-block']) }}

				{!! Form::close() !!}
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					{!! Html::linkRoute('posts.index','<< Back', array($post->id), array('class'=>'btn btn-secondary btn-block text-center')) !!}
				</div>
			</div>
		</div>
	</div>
@endsection