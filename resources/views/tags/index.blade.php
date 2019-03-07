@extends('master')

@section('title','| All Tags')

@section('content')
	<h2>Tags</h2>
	<div class="row">
		<div class="col-md-8">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
					<hr>
				</thead>
				<tbody>
					@foreach($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<h1>Add Tag</h1>
			{!! Form::open([route('tags.store'),'method'=>'POST']) !!}

				{{ Form::label('name','Name:') }}
				{{ Form::text('name', null, ['class'=>'form-control']) }}
				{{ Form::submit('Add Tags',['class'=>'form-control btn btn-success mt-3'])}}

			{!! Form::close() !!}

		</div>
	</div>
@endsection 