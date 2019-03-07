@extends('master')

@section('title','| All Category')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<h1>Add Category</h1>
			{!! Form::open([route('categories.store'),'method'=>'POST']) !!}

				{{ Form::label('name','Name:') }}
				{{ Form::text('name', null, ['class'=>'form-control']) }}
				{{ Form::submit('Add Category',['class'=>'form-control btn btn-success mt-3'])}}

			{!! Form::close() !!}

		</div>
	</div>
@endsection