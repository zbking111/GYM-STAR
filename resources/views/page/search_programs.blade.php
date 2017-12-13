@extends('userpage')
@section('title')
Result Search
@endsection

@section('content')
<div class="col-sm-8 text-left"> 
	<div>
		<h3>
			<a href="{{ route('homepage') }}">Home</a> /
			Search found : {{ $result_count}} result
		</h3>
	</div>  
	@foreach($program as $p)
	<div class="well">
		<div class="media">
			<a class="pull-left" href="{{ route('info_program',$p->id) }}">
				<img src="{{$p->image}}" class="img-responsive" style="width:350px" alt="No Image">
			</a>
			<div class="media-body">
				<h3><a href="{{ route('info_program',$p->id) }}">Title : {{ $p->title}}</a></h3>
				<h4>
					Level : @if($p->level == 1 ){{ "Light" }}
					@elseif($p->level == 2 ){{ "Medium" }}
					@elseif($p->level == 3 ){{ "Hard" }}
					@endif
				</h4>		
				<p>Coach : |
					@foreach($coach as $c)
					@if($p->id == $c->id_program)
					<a href="{{ route('info_coach',$c->id) }}"> {{ $c->fullname }} |</a>
					@endif
					@endforeach
				</p>
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
				if($check == 1) echo "<strong>SUBSCRIBED</strong>";
				?>
				@if($check == 0 && (Auth::user()->aim != 2))
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
