@extends('userpage')
@section('title')
Programs Details
@endsection

@section('content')
<div class="col-sm-8 text-left"> 

	<div class="well">
		<div class="media">
			<div class="media-body">
				<h3>Title : {{ $p[0]->title}}</h3>
				<h4>
					Level : @if($p[0]->level == 1 ){{ "Light" }}
					@elseif($p[0]->level == 2 ){{ "Medium" }}
					@elseif($p[0]->level == 3 ){{ "Hard" }}
					@endif
				</h4>
				<p>Coach : |@foreach($coach as $c)

					@if($p[0]->id == $c->id_program)<a href="{{ route('info_coach',$c->id) }}"> {{ $c->fullname }} |</a>@endif

					@endforeach

				</p>
				<div align="center">
					<img src="{{$p[0]->image}}" alt="Image">
				</div>
				<br>
				<ul class="list-inline list-unstyled">
					@if(isset($like) && (count($like)>0))
					<?php $check = 0;
					foreach ($like as $l){
						if($l->id_user == Auth::user()->id)
							$check = 1;
						}
						?>
						@if($check == 1)
						<b> <span class="glyphicon glyphicon-thumbs-up"></span> {{count($like)}} Liked</b>
						@else
						<li><a href="{{ route('like_program',$p[0]->id) }}"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
						@endif
						&nbsp;&nbsp;&nbsp;&nbsp;

						@else
						<li><a href="{{ route('like_program',$p[0]->id) }}"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a></li>&nbsp;&nbsp;&nbsp;&nbsp;

						@endif
						<span><i class="glyphicon glyphicon-comment"></i>
							{{$count}}
						</span>
					</ul>
				</div>
			</div>
		</div>


		<div>
			<h2>Actions :</h2>
			@foreach($action as $at)													
			<h4>- {{$at->content}}</h4>
			@endforeach

			<hr>
		</div>

		@if($practiced)
		<h4>Subscribed</h4>
		@else
		<h3><a href="{{ route('subscribe',$p[0]->id) }}">Subscribe now >> </a></h3>
		@endif
		<hr>

		<form action="{{ route('comment_program',$p[0]->id) }}" method="post" id="comment" name="comment">
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

		@if(isset($comments_programs))
		@foreach($comments_programs as $cp)
		<div>
			<b>{{$cp->fullname}}</b>
			<p>{{$cp->content}}</p>
			<span><i class="glyphicon glyphicon-calendar"></i> {{$cp->created_at}} </span>
		</div>
		<hr>
		@endforeach
		<div align="center" class="row">{{ $comments_programs->appends(Request::all())->links() }}</div>

		@endif

	</div>

	@endsection
