@extends('master')
	@section('title','| Create Post')
	@section('content')
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2>Create The Post</h2>
				{!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'','files'=>'true']) !!}
					{{ Form::label('title', 'Title:') }}
					{{ Form::text('title', null, array('class'=>'form-control','required'=>'','maxlength'=>'128')) }}

					{{ Form::label('slug', 'Slug:')}}
					{{ Form::text('slug', null, array('class'=>'form-control','required'=>''))}}

					{{ Form::label('category_id','Category:')}}
					<select name="category_id" class="form-control">
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>

					@endforeach
					</select>

					{{ Form::label('tags','Tags:')}}
					<select name="tags[]" class="form-control select2-multi" multiple="multiple" id="tags">
					@foreach($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>

					@endforeach
					</select>
					{{ Form::label('image','Image:')}}
					{{ Form::file('image') }}<br>

					{{ Form::label('body','Post Body:')}}
					{{ Form::textarea('body',null, array('class'=>'form-control mb-3','required'=>''))}}

					{{Form::submit('Create Post', array('class'=>'btn btn-success form-control mb-3'))}}

				{!! Form::close() !!}
			</div>
		</div>
	@endsection

	@section('script')
		<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=your_API_key"></script>

		<script>
			tinymce.init({
			    selector: 'textarea'
			  });
		</script>

		<script>
		$(document).ready(function() {
		    $('.select2-multi').select2();
		});
		</script>
	@endsection