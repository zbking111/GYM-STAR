@extends('userpage')
@section('title')
All programs
@endsection

@section('content')
<div class="col-sm-8 text-left"> 

	<div align="center">
		<h3>Coach's Profile</h3>
		<hr>
		<h4><label class="control-label">Fullname : {{ $training[0]->fullname }}</label></h4>
		<h4><label class="control-label">Email : {{ $training[0]->email }}</label></h4>
		<h4><label class="control-label">Birth : {{ date('d-m-Y', strtotime($training[0]->birth)) }}</label></h4>
		<h4><label class="control-label">Address : {{ $training[0]->address }}</label></h4>
		<h4><label class="control-label">Weight : {{ $training[0]->weight }}</label></h4>
		<h4><label class="control-label">Job : {{ $training[0]->job }}</label></h4>
	</div>

	<div>
		<hr>
		<center><h3>Programs </h3></center>
		
		@foreach ($training as $t)
		<div class="well">
			<div class="media">
				<div class="media-body">
					<h3><a href="{{ route('info_program',$t->id) }}">Title : {{ $t->title}}</a></h3>
					<h4>
						Level : @if($t->level == 1 ){{ "Light" }}
						@elseif($t->level == 2 ){{ "Medium" }}
						@elseif($t->level == 3 ){{ "Hard" }}
						@endif
					</h4>

					<p>Coach : |@foreach($coach as $c)

						@if($t->id_program == $c->id_program)<a href="{{ route('info_coach',$c->id) }}"> {{ $c->fullname }} |</a>@endif

						@endforeach

					</p>
					<div align="center">
						<img src="{{$t->image}}" alt="Image">
					</div>

					<br>
					@if(!isset($practice))
					<a href="{{route('subscribe',$p->id)}}">Subscribe</a><hr>
					@else
					<?php
					$check = 0;
					foreach ($practice as $pr) {
						if($pr->id_program == $t->id_program) {
							$check = 1;
							break;
						}
					}
					if($check == 1) echo "Subscribed";
					?>
					@if($check == 0)
					<h4><a href="{{route('subscribe',$t->id_program)}}">Subscribe now >> </a></h4>
					@endif
					@endif

					
				</div>
			</div>
		</div>
		
		@endforeach

	</div>
	<div align="center" class="row">{{ $training->appends(Request::all())->links() }}</div>

</div>

@endsection
