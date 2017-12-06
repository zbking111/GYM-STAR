@extends('userpage')
@section('title')
All Blog
@endsection
@section('content')

<div class="col-sm-8 text-left">
	<center><h3>Recent blogs : found {{$count}} blogs</h3></center>
	@foreach($user_blog as $ub)
	<div class="well">
		<div class="media">
			<a class="pull-left" href="#">
				<img class="media-object" src="http://placekitten.com/150/150">
			</a>
			<div class="media-body">
				<a href="{{ route('detail_blog',$ub->id) }}"><h4 class="media-heading">{{$ub->title}}</h4></a>
				<p class="text-right">by <b>{{$ub->fullname}}</b></p>
				<p>{{$ub->content}}</p>
				<ul class="list-inline list-unstyled">
					<li><span><i class="glyphicon glyphicon-calendar"></i> {{$ub->created_at}} </span></li>
					<li>|</li>
					<span><i class="glyphicon glyphicon-comment"></i>
						<?php
						$count = 0;?>
						@foreach($comments_blogs as $cb)
						<?php
						if($ub->id == $cb->id_blog)
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
	<div align="center" class="row">{{ $user_blog->appends(Request::all())->links() }}</div>
</div>
@endsection