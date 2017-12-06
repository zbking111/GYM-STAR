@extends('userpage')
@section('title')
Result Search
@endsection

@section('content')
<div class="col-sm-8 text-left"> 

	<h1>Search found : {{ $result_count}} result</h1>

	@foreach($program as $p)
	<div class="well">
		<div class="media">
			<div class="media-body">
				<h3><a href="{{ route('info_program',$p->id) }}">Title : {{ $p->title}}</a></h3>
				<h4>
					Level : @if($p->level == 1 ){{ "Light" }}
					@elseif($p->level == 2 ){{ "Medium" }}
					@elseif($p->level == 3 ){{ "Hard" }}
					@endif
				</h4>
				
				<p>Coach : |@foreach($coach as $c)

					@if($p->id == $c->id_program)<a href="{{ route('info_coach',$c->id) }}"> {{ $c->fullname }} |</a>@endif

					@endforeach

				</p>
				<div align="center">
					<img src="{{$p->image}}" alt="Image">
				</div>
				
				<br>
				<a href=""><span class="glyphicon glyphicon-thumbs-up"></span> Like</a>
				<br>
				@if(!isset($practice))
				<a href="{{route('subscribe',$p->id)}}">Subscribe</a>
				@else
				<?php
				$check = 0;
				foreach ($practice as $pr) {
					if($pr->id_program == $p->id) {
						$check = 1;
						break;
					}
				}
				if($check == 1) echo "Subscribed";
				?>
				@if($check == 0)
				<h4><a href="{{route('subscribe',$p->id)}}">Subscribe now >> </a></h4>
				@endif
				@endif
				<hr>
			</div>
		</div>
	</div>
	
	@endforeach
	<div align="center" class="row">{{ $program->appends(Request::all())->links() }}</div>
	
</div>

@endsection
