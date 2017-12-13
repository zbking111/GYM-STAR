@extends('master')
@section('title')
Register Lesson
@endsection
@section('content')

<div class="container">
<div>
	<h3>
		<a href="{{ route('homepage') }}">Home</a> /
		Register lesson
	</h3>
</div> 	
	<form action="{{ route('register_lesson') }}" method="GET" onsubmit="return confirm('Are you sure?');">
		<div class="row">
			<div class="col-sm-4">
				<h3>Light</h3>
				<hr>
				@foreach($programs_light as $program)		
				<div class="form-group">
					<input class="chk" id="hard" type="checkbox" name="register_lesson[]" value="{{$program->id}}"
					@if(isset($trainings))
					@foreach($trainings as $training)
					@if($training->id_program == $program->id)
					checked="" disabled="" 
					@endif
					@endforeach
					@endif
					>
					<strong> {{ $program->title }} </strong>
				</div>
				@endforeach
			</div>
			<div class="col-sm-4">
				<h3>Medium</h3>
				<hr>
				@foreach($programs_medium as $program)		
				<div class="form-group">
					<input class="chk" id="medium" type="checkbox" name="register_lesson[]" value="{{$program->id}}"
					@if(isset($trainings))
					@foreach($trainings as $training)
					@if($training->id_program == $program->id)
					checked="" disabled="" 
					@endif
					@endforeach
					@endif
					>
					<strong> {{ $program->title }} </strong>
				</div>
				@endforeach
			</div>

			<div class="col-sm-4">
				<h3>Hard</h3>
				<hr>
				@foreach($programs_hard as $program)		
				<div class="form-group">
					<input class="chk" id="light" type="checkbox" name="register_lesson[]" value="{{$program->id}}"
					@if(isset($trainings))
					@foreach($trainings as $training)
					@if($training->id_program == $program->id)
					checked="" disabled="" 
					@endif
					@endforeach
					@endif
					>
					<strong> {{ $program->title }} </strong>
				</div>
				@endforeach
			</div>
		</div>
		<div class="form-group">
			<input id="submit" name="submit" type="submit" value="Register" class="btn btn-primary">
			@if(Session::has('success'))<div class="text-success">{{Session::get('success')}}</div>	@endif
			@if(Session::has('failed'))<div class="text-danger">{{Session::get('failed')}}</div>	@endif		
		</div>
	</form>


</div>

<script>
	$('#submit').prop("disabled", true);
	$('input:checkbox').click(function() {
		if ($(this).is(':checked')) {
			$('#submit').prop("disabled", false);
		} else {
			if ($('.chk').filter(':checked').length < 1){
				$('#submit').attr('disabled',true);}
			}
		});
</script>

@endsection