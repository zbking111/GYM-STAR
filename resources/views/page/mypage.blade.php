@extends('userpage')
@section('title')
{{ucfirst(Auth::user()->username)}}'s Page
@endsection

@section('content')
<div class="col-sm-8 text-left"> 
	@if(!isset($program))
	<div><h1>You don't subscribe program</h1></div>
	@else
	<div>
		<h3>
			<a href="{{ route('homepage') }}">Home</a> /
			My Programs: You subscribed {{$count_program}} program
		</h3>
	</div> 
	@foreach($program as $p)
	<div class="well">
		<div class="media">
			<a class="pull-left" href="{{ route('info_program',$p->id) }}">
				<img src="{{$p->image}}" class="img-responsive" style="width:350px" alt="No Image">
			</a>
			<div class="media-body">
				<h3><a href="{{ route('show_program_detail',$p->id) }}">Title : {{ $p->title}}</a></h3>
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
				<hr>
			</div>
		</div>
	</div>

	@endforeach
	<div align="center" class="row">{{ $program->appends(Request::all())->links() }}</div>
	@endif
</div>
@endsection
