@extends('master')
@section('title','| Tag Edit')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			{!! Form::model($tag, ['route' => ['tags.update',$tag->id],'method'=>'PUT']) !!}

				{{ Form::label('name',"Name:")}}
				{{ Form::text('name', null, ['class'=>'form-control']) }}

				{{ Form::submit('Save Change',['class'=>'btn btn-success mt-3'])}}
			{!! Form::close() !!}
		</div>
	</div>
@endsection