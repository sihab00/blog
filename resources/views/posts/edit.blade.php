@extends('master')
@section('title','| Edit Post')

@section('content')
	{!! Form::model($post, ['route' => ['posts.update',$post->id],'method'=>'PUT','files'=>'true']) !!}
	<div class="row">
		<div class="col-md-8">
			{{Form::label('title','Title:')}}
			{{Form::text('title',null,['class'=>'form-control'])}}
			
			{{Form::label('slug','Slug:')}}
			{{Form::text('slug',null,['class'=>'form-control'])}}
			
			{{Form::label('category_id','Category:')}}
			{{Form::select('category_id',$categories, null,['class'=>'form-control'])}}

			{{Form::label('tags','Tags:')}}
			{{Form::select('tags[]',$tags, null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}

			{{ Form::label('image','Image:')}}
			{{ Form::file('image')}}<br>

			{{Form::label('body','Body:')}}
			{{Form::textarea('body',null,['class'=>'form-control'])}}
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url:</label>
					<p><a href="{{ url($post->slug)}}">{{ url($post->slug) }}</a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Cteate At:</label>
					<p>{{ date('M j Y h:ia', strtotime($post->created_at))}}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j Y h:ia', strtotime($post->updated_at))}}</p>
				</dl>
			</div>
			<div class="row">
				<div class="col-md-6">
					{!! Html::linkRoute('posts.show','Cancel', array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
				</div>
				<div class="col-md-6">
					{{Form::submit('Save Changes',['class'=>'btn btn-success btn-block'])}}
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
@endsection
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=your_API_key"></script>
	<script>
		tinymce.init({
		    selector: 'textarea'
		  });
	</script>
@section('script')
	<script>
		$(document).ready(function() {
		    $('.select2-multi').select2();
		    $('.select2-multi').select2().val({!! $post->tags()->allRelatedIds() !!}).trigger('change');
		});
	</script>
@endsection