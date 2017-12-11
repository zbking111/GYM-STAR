@extends('userpage')
@section('title')
All programs
@endsection

@section('content')

<div class="col-sm-8 text-left">
	<center><h3>All programs : found {{$count}} result</h3></center>
	<div>
		<ul class="list-inline list-unstyled">
			<li>Sort by :</li>
			<li><a href="{{ route('top_like') }}"> Like</a></li>
		</ul>
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

				<p>Coach : |@foreach($coach as $c)

					@if($p->id == $c->id_program)<a href="{{ route('info_coach',$c->id) }}"> {{ $c->fullname }} |</a>@endif

					@endforeach

				</p>
				{{-- <div align="center">
					<img src="{{$p->image}}" alt="Image">
				</div> --}}
				<br>
				<ul class="list-inline list-unstyled">
					@if(isset($like))
					<?php
					$count = 0;?>
					@foreach($like as $l)
					<?php
					if($p->id == $l->id_program)
						$count++;
					?>
					@endforeach
					
					<b> <span class="glyphicon glyphicon-thumbs-up"></span> {{$count}} Liked&nbsp;&nbsp;&nbsp;&nbsp;</b>
					
					@endif
					<span><i class="glyphicon glyphicon-comment"></i>
						<?php
						$count = 0;?>
						@foreach($comment as $c)
						<?php
						if($p->id == $c->id_program)
							$count++;
						?>
						@endforeach
						{{$count}}
					</span>
				</ul>
				
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
				@if(($check == 0) && (Auth::user()->aim != 2))
				<h4><a href="{{route('subscribe',$p->id)}}">Subscribe now >> </a></h4>
				@endif
				@endif

			</div>
		</div>
	</div>
	@endforeach

	<div align="center" class="row">{{ $program->appends(Request::all())->links() }}</div>

</div>

@endsection
