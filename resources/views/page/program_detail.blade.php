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
				<img src="{{$p[0]->image}}" alt="Image">
				<hr>
			</div>
		</div>
	</div>

	<div>
		<h2>Actions :</h2>

		

		<form action="{{ route('completed_actions',$p[0]->id)}}" method="get">		
			@foreach($action as $at)
			<div class="checkbox">
				<label>	
					<?php
					$check = 0;
					foreach ($action_completed as $at_c) {
						if($at_c->id_action == $at->id) {
							$check = 1;
							break;
						}
					}
					?>
					
					<input @if($check) checked="" disabled="" @endif
					@if($practice[0]->updated_at == $practice[0]->created_at) disabled="" @endif 
					type="checkbox" name="action_completed[]" value="{{$at->id}}">
					@if($check)- <s>{{$at->content}}</s>
					@else
					- {{$at->content}}
					@endif
				</label>
			</div>
			@endforeach
			
			<div class="form-group">
				@if(count($action) == count($action_completed))
				<h2>You have completed the program</h2>
				@elseif($practice[0]->updated_at == $practice[0]->created_at)
				<h3>
					<a href="{{ route('start_program',$p[0]->id) }}">
						Start now >>
					</a>
				</h3>			
				@else
				<input name="Submit" type="submit" value="OK" class="btn btn-primary">
				@endif
			</div>
		</form>
		
	</div>

	@if(($practice[0]->completed_time == "") && ($practice[0]->updated_at != $practice[0]->created_at))
	<p>Time start : {{ $practice[0]->updated_at }}</p>
	<p>Time:
		<?php

		$currentTime = new DateTime();
		$interval = $practice[0]->updated_at->diff($currentTime);
		echo $interval->format('%d days %H hours %i minutes %s seconds');

		?> 
	</p>
	@elseif($practice[0]->completed_time != "")
	<h4>Completed time: {{ $practice[0]->completed_time }} </h4> 
	@endif
	<hr>

</div>

@endsection
