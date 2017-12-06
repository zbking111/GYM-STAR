@extends('userpage')
@section('title')
Detail Blog
@endsection
@section('content')

<div class="col-sm-8 text-left">
	<h1>Detail blog</h1>
	<div class="well">
		<div class="media">
			<a class="pull-left" href="#">
				<img class="media-object" src="http://placekitten.com/150/150">
			</a>
			<div class="media-body">
				<a href="{{ route('detail_blog',$blog[0]->id) }}"><h4 class="media-heading">{{$blog[0]->title}}</h4></a>
				<p class="text-right">by <b>{{$user[0]->fullname}}</b></p>
				<p>{{$blog[0]->content}}</p>
				<ul class="list-inline list-unstyled">
					<li><span><i class="glyphicon glyphicon-calendar"></i> {{$blog[0]->created_at}} </span></li>
					<li>|</li>
					<span><i class="glyphicon glyphicon-comment"></i>
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
	<form action="{{ route('comment_blog',$blog[0]->id) }}" method="post" id="comment" name="comment">
		{{csrf_field()}}
		<div class="form-group">
			<label for="content">Leave a comment:</label>
			<textarea class="form-control" rows="5" name="content" id="content"></textarea>
			<span class="text-danger" id="error-content"></span>
			@if ($errors->has('content'))
			<span class="help-block">
				<strong>{{ $errors->first('content') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group">            
			<input name="Submit" type="submit" value="Post" class="btn btn-primary">
		</div>
	</form>

	<script type="text/javascript">
		$("#comment").validate({
			rules:{
				content:{
					required:true,
				},
			},
			messages:{

			},

			errorPlacement: function(error, element) {
				error.appendTo('#error-' + element.attr('id'));
			}


		})
	</script>

	<hr>

	@if(isset($comments_blogs))
	@foreach($comments_blogs as $cb)
	<div>
		<b>{{$cb->fullname}}</b>
		<p>{{$cb->content}}</p>
		<span><i class="glyphicon glyphicon-calendar"></i> {{$cb->created_at}} </span>
	</div>
	<hr>
	@endforeach
	<div align="center" class="row">{{ $comments_blogs->appends(Request::all())->links() }}</div>

	@endif


</div>
@endsection