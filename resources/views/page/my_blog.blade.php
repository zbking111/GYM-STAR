@extends('userpage')
@section('title')
My Blog
@endsection
@section('content')

<div class="col-sm-8 text-left"> 
	<div>
		<h3>
			<a href="{{ route('homepage') }}">Home</a> /
			My Blog
		</h3>
	</div>

	<!-- xuat loi neu co -->
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form action="{{ route('post_blog') }}" method = "POST" enctype="multipart/form-data" id="blog">
		{{csrf_field()}}
		<div class="form-group">
			<label class="control-label">Title</label><br>			
			<input type="text" class="form-control" name="title" id="title" placeholder="Enter your Blog's Title" required="" value="">
			<span class="text-danger" id="error-title"></span>
		</div>

		<div class="form-group">
			<label for="content">Content:</label>
			<textarea class="form-control" rows="5" name="content" id="content"></textarea>
			<span class="text-danger" id="error-content"></span>
		</div>

		<div class="form-group">
			<label for="image">Image:</label>
			<input type="file" class="form-control" name="image" id="image">
		</div>

		<div class="form-group">            
			<input name="Submit" type="submit" value="Post" class="btn btn-primary">
		</div>

	</form>
	@if(Session::has('success'))<div class="alert alert-success" align="center">{{ Session::get('success')}}</div>
	@endif
	<hr>

	@if(!isset($blog))
	{{"You have no posts"}}
	@else
	<h3>Recent post: found {{$count}} posts</h3>
	@foreach($blog as $post)
	<div class="well">
		<div class="media">
			<a class="pull-left" href="{{ route('detail_blog',$post->id) }}">
				<img src="../upload/{{$post->image}}" class="img-responsive" style="width:300px" alt="No Image">
			</a>
			<div class="media-body">
				<a href="{{ route('detail_blog',$post->id) }}"><h4 class="media-heading">{{$post->title}}</h4></a>
				<p>{{$post->content}}</p>
				<ul class="list-inline list-unstyled">
					<li><span><i class="glyphicon glyphicon-calendar"></i> {{$post->created_at}} </span></li>
					<li>|</li>
					<span><i class="glyphicon glyphicon-comment"></i>

						<?php
						$count = 0;?>
						@foreach($comments_blogs as $cb)
						<?php
						if($post->id == $cb->id_blog)
							$count++;
						?>
						@endforeach
						{{$count}}
					</span>
					<li>|</li>
					<li>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star-empty"></span>

					</li>
					<li>|</li>
					<li><a href="{{ route('show_form_edit_blog',$post->id) }}"><span class="glyphicon glyphicon-edit">Edit</span></a></li>
					<li>|</li>
					<li><a href="{{ route('blog.delete',$post->id) }}"><span class="glyphicon glyphicon-remove">Delete</span></a></li>
				</ul>
			</div>
		</div>
	</div>
	@endforeach
	<div align="center" class="row">{{ $blog->appends(Request::all())->links() }}</div>
	@endif

	<script type="text/javascript">
		$("#blog").validate({
			rules:{
				title:{
					required:true,
					minlength: 5,
					maxlength: 150,
					
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