@extends('userpage')
@section('title')
{{ucfirst(Auth::user()->username)}}'s Page
@endsection

@section('content')
<div class="col-sm-8 text-left"> 
	
	@if(!isset($program))
	<div><h1>You don't subscribe program</h1></div>
	@else
	<center><h3>My Programs: You subscribed {{$count_program}} program</h3></center>
	@foreach($program as $p)
	<div class="well">
		<div class="media">
			<div class="media-body">
				<h3><a href="{{ route('show_program_detail',$p->id) }}">Title : {{ $p->title}}</a></h3>
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
				<hr>
			</div>
		</div>
	</div>

	{{-- 	<div><a href="{{ route('start_program',$p->id) }}">Start Program</a></div><hr> --}}

	@endforeach
	<div align="center" class="row">{{ $program->appends(Request::all())->links() }}</div>
	@endif
	
</div>

@endsection
