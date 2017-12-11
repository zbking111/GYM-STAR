@extends('userpage')
@section('title')
My Blog
@endsection
@section('content')

<div class="col-sm-8 text-left"> 
	<center><h1>My Blog</h1></center>

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

	<form action="{{ route('post_blog') }}" method = "POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group">
			<label class="control-label">Title</label><br>			
			<input type="text" class="form-control" name="title" id="title" placeholder="Enter your Blog's Title" required="" value="">
			
		</div>

		<div class="form-group">
			<label for="content">Content:</label>
			<textarea class="form-control" rows="5" name="content" id="content"></textarea>
		</div>

		<div class="form-group">
			<label for="image">Image:</label>
			<input type="file" class="form-control" name="image" id="image">
		</div>

		<div class="form-group">            
			<input name="Submit" type="submit" value="Post" class="btn btn-primary">
		</div>

	</form>
	<hr>

	@if(!isset($blog))
	{{"You have no posts"}}
	@else
	<h3>Recent post: found {{$count}} posts</h3>
	@foreach($blog as $post)
	<div class="well">
		<div class="media">
			<a class="pull-left" href="{{ route('detail_blog',$post->id) }}">
				<img src="../upload/{{$post->image}}" class="img-responsive" style="width:200px" alt="No Image">
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
					<li>
						<!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
						<span><i class="fa fa-facebook-square"></i></span>
						<span><i class="fa fa-twitter-square"></i></span>
						<span><i class="fa fa-google-plus-square"></i></span>
					</li>
				</ul>
			</div>
		</div>
	</div>
	@endforeach
	<div align="center" class="row">{{ $blog->appends(Request::all())->links() }}</div>
	@endif
	
</div>

@endsection