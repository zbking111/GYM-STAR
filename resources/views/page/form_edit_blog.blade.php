@extends('userpage')
@section('title')
Detail Blog
@endsection
@section('content')

<div class="col-sm-8 text-left">	
	<div>
		<h3>
			<a href="{{ route('homepage') }}">Home</a> /
			<a href="{{ route('myblog') }}">My Blog</a> /
			Edit Blogs
		</h3>
	</div>
	<form action="{{ route('blog.edit',$post->id) }}" method = "POST" enctype="multipart/form-data" id="blog">
		{{csrf_field()}}
		<div class="form-group">
			<label class="control-label">Title</label><br>			
			<input type="text" class="form-control" name="title" id="title" required="" value="{{ $post->title}}">
			<span class="text-danger" id="error-title"></span>
			@if ($errors->has('title'))
			<span class="help-block">
				<strong>{{ $errors->first('title') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group">
			<label for="content">Content:</label>
			<textarea class="form-control" rows="5" name="content" required="" id="content">{{ $post->content }}</textarea>
			<span class="text-danger" id="error-content"></span>
			@if ($errors->has('content'))
			<span class="help-block">
				<strong>{{ $errors->first('content') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group">            
			<input name="Submit" type="submit" value="Save" class="btn btn-primary">
			<input name="reset" type="reset" value="Reset" class="btn btn-primary">
		</div>

	</form>
	@if(Session::has('success'))<div class="alert alert-success" align="center">{{ Session::get('success')}}</div>
	@endif

	<script type="text/javascript">
		$("#blog").validate({
			rules:{
				title:{
					required:true,
					minlength: 5,

				},
				content:{
					required:true,
					minlength: 5,
				},
			},
			messages:{

			},

			errorPlacement: function(error, element) {
				error.appendTo('#error-' + element.attr('id'));
			}


		})
	</script>
</div>
@endsection