@extends('userpage')
@section('title')
All Coachs
@endsection

@section('content')

<div class="col-sm-8 text-left">
	<strong><h3>All Coach : found {{ count($coachs)}} result</h3></strong>

	@foreach($coachs as $coach)
	<div class="well">
		<div class="media">
			<div class="media-body">
				<a href="{{ route('info_coach',$coach->id) }}">Name: {{ $coach->fullname }}</a>
				<p>Email: {{$coach->email}}</p>
				<p>Birth: {{$coach->birth}}</p>
				<p>Weight: {{$coach->weight}}</p>
				<p>Address: {{$coach->address}}</p>
				<p>Job #: {{$coach->job}}</p>
			</div>
		</div>
	</div>
	@endforeach

	<div align="center" class="row">{{ $coachs->appends(Request::all())->links() }}</div>

</div>

@endsection
