@extends('master')
@section('title','| Edit Comments')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1>Edit Comment</h1>
			{{ Form::model($comment,['route'=>['comments.update',$comment->id], 'method'=>'PUT'])}}

			{{ Form::label('name','Name:') }}
			{{ Form::text('name',null,['class'=>'form-control', 'disabled'=>'disabled']) }}

			{{ Form::label('email','Email:')}}
			{{ Form::text('email', null, ['class'=>'form-control','disabled'=>'disabled']) }}
			{{ Form::label('comment','Comment:') }}
			{{ Form::textarea('comment',null,['class'=>'form-control']) }}

			{{ Form::submit('Update',['class'=>'btn btn-success mt-3'])}}

			{{ Form::close()}}
		</div>
	</div>
	
@endsection