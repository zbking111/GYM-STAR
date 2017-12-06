@extends('master')
@section('title')
@if(Auth::check())
{{ucfirst(Auth::user()->username)}}
@endif
@endsection
@section('content')

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="image/slide/gym1.jpg" alt="gym1" width="1200" height="700">
      <div class="carousel-caption">
        <h2>Practice Health</h2>
        <p>Health is very important.</p>
      </div>      
    </div>

    <div class="item">
      <img src="image/slide/gym2.jpg" alt="gym2" width="1200" height="700">
      <div class="carousel-caption">
        <h2>Practice Health</h2>
        <p>Health is very important.</p>
      </div>      
    </div>
    
    <div class="item">
      <img src="image/slide/gym3.jpg" alt="gym3" width="1200" height="700">
      <div class="carousel-caption">
        <h2>Practice Health</h2>
        <p>Health is very important.</p>
      </div>      
    </div>

    <div class="item">
      <img src="image/slide/gym4.jpg" alt="gym4" width="1200" height="700">
      <div class="carousel-caption">
        <h2>Practice Health</h2>
        <p>Health is very important.</p>
      </div>      
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-8">
			<section>      
				<h1 class="entry-title"><span>@if(Auth::check())
					{{ucfirst(Auth::user()->username)}}'s Profile
				@endif</span> </h1>
				<hr>
				<form action="{{route('update_profile')}}" class="form-horizontal" method="post" name="update_profile" id="update_profile" enctype="multipart/form-data" >
					{{ csrf_field() }}
					<input type="hidden" name="id" id="id" value="{{$profile[0]->id}}">            
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label class="control-label col-sm-3">Email ID <span class="text-danger">*</span></label>
						<div class="col-md-8 col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
								<input type="email" class="form-control" name="email" id="email" placeholder="" readonly required="" value="{{$profile['0']->email}}">
							</div>
							<span class="text-danger" id="error-email"></span>

							@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
						<label class="control-label col-sm-3">Username <span class="text-danger">*</span></label>
						<div class="col-md-8 col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="{{ $profile['0']->username }}" readonly required>
							</div>
							<span class="text-danger" id="error-username"></span>
							@if ($errors->has('username'))
							<span class="help-block">
								<strong>{{ $errors->first('username') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
						<label class="control-label col-sm-3">Full Name <span class="text-danger">*</span></label>
						<div class="col-md-8 col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter Full Name" value="{{ $profile['0']->fullname }}" required>
							</div>
							<span class="text-danger" id="error-fullname"></span>
						</div>
						

					</div>


					<div class="form-group">
						<label class="control-label col-sm-3">Date of Birth <span class="text-danger">*</span></label>
						<div class="col-xs-8">
							<div class="form-inline">
								<div class="form-group">
									<select name="dd" class="form-control">
										<option value="{{date("d",strtotime($profile[0]->birth))}}">@if($profile[0]->birth != ""){{date("d",strtotime($profile[0]->birth))}}
										@else Date @endif </option>
										<option value="01" >1 </option><option value="02" >2 </option><option value="03" >3 </option><option value="04" >4 </option><option value="05" >5 </option><option value="06" >6 </option><option value="07" >7 </option><option value="08" >8 </option><option value="09" >9 </option><option value="10" >10 </option><option value="11" >11 </option><option value="12" >12 </option><option value="13" >13 </option><option value="14" >14 </option><option value="15" >15 </option><option value="16" >16 </option><option value="17" >17 </option><option value="18" >18 </option><option value="19" >19 </option><option value="20" >20 </option><option value="21" >21 </option><option value="22" >22 </option><option value="23" >23 </option><option value="24" >24 </option><option value="25" >25 </option><option value="26" >26 </option><option value="27" >27 </option><option value="28" >28 </option><option value="29" >29 </option><option value="30" >30 </option><option value="31" >31 </option>                </select>
									</div>
									<div class="form-group">
										<select name="mm" class="form-control">
											<option value="{{date("m",strtotime($profile[0]->birth))}}">@if($profile[0]->birth != ""){{date("M",strtotime($profile[0]->birth))}}
										@else Month @endif</option>
											<option value="01">Jan</option><option value="02">Feb</option><option value="03">Mar</option><option value="04">Apr</option><option value="05">May</option><option value="06">Jun</option><option value="07">Jul</option><option value="08">Aug</option><option value="09">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>                </select>
										</div>
										<div class="form-group" >
											<select name="yyyy" class="form-control">
												<option value="{{date("Y",strtotime($profile[0]->birth))}}">@if($profile[0]->birth != ""){{date("Y",strtotime($profile[0]->birth))}}
										@else Year @endif</option>
												<option value="1955" >1955 </option><option value="1956" >1956 </option><option value="1957" >1957 </option><option value="1958" >1958 </option><option value="1959" >1959 </option><option value="1960" >1960 </option><option value="1961" >1961 </option><option value="1962" >1962 </option><option value="1963" >1963 </option><option value="1964" >1964 </option><option value="1965" >1965 </option><option value="1966" >1966 </option><option value="1967" >1967 </option><option value="1968" >1968 </option><option value="1969" >1969 </option><option value="1970" >1970 </option><option value="1971" >1971 </option><option value="1972" >1972 </option><option value="1973" >1973 </option><option value="1974" >1974 </option><option value="1975" >1975 </option><option value="1976" >1976 </option><option value="1977" >1977 </option><option value="1978" >1978 </option><option value="1979" >1979 </option><option value="1980" >1980 </option><option value="1981" >1981 </option><option value="1982" >1982 </option><option value="1983" >1983 </option><option value="1984" >1984 </option><option value="1985" >1985 </option><option value="1986" >1986 </option><option value="1987" >1987 </option><option value="1988" >1988 </option><option value="1989" >1989 </option><option value="1990" >1990 </option><option value="1991" >1991 </option><option value="1992" >1992 </option><option value="1993" >1993 </option><option value="1994" >1994 </option><option value="1995" >1995 </option><option value="1996" >1996 </option><option value="1997" >1997 </option><option value="1998" >1998 </option><option value="1999" >1999 </option><option value="2000" >2000 </option><option value="2001" >2001 </option><option value="2002" >2002 </option><option value="2003" >2003 </option><option value="2004" >2004 </option><option value="2005" >2005 </option><option value="2006" >2006 </option>                </select>
											</div>
										</div>
									</div>
								</div>


								<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
									<label class="control-label col-sm-3">Address</label>
									<div class="col-md-8 col-sm-9">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
											<input type="text" class="form-control" name="address" id="address" placeholder="Enter your Address" value="{{ $profile['0']->address }}">
										</div>
										<span class="text-danger" id="error-address"></span>
									</div>

								</div>

								<div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
									<label class="control-label col-sm-3">Weight</label>
									<div class="col-md-8 col-sm-9">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-scale"></i></span>
											<input type="number" class="form-control" name="weight" id="weight" placeholder="Enter your Weight(Kg)" value="{{$profile['0']->weight}}">
										</div>
										<span class="text-danger" id="error-weight"></span>
									</div>

								</div>

								<div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
									<label class="control-label col-sm-3">Job</label>
									<div class="col-md-8 col-sm-9">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
											<input type="text" class="form-control" name="job" id="job" placeholder="Enter your Job" value="{{$profile['0']->job}}">
										</div>
										<span class="text-danger" id="error-job"></span>
									</div>

								</div>

								<div class="form-group">
									<label class="control-label col-sm-3">Aim <span class="text-danger">*</span></label>
									<div class="col-md-8 col-sm-9">
										<label><input name="aim" type="radio" value="1" @if($profile['0']->aim === "1") checked @endif> Practice </label><br>
										<label><input name="aim" type="radio" value="2" @if($profile['0']->aim === "2") checked @endif > Coach </label><br>
										<label><input name="aim" type="radio" value="3" @if($profile['0']->aim === "3") checked @endif > Both </label>
										   
									</div>
								</div>

								<div class="form-group">
									<div class="col-xs-offset-3 col-xs-10">
										@if(Session::has('success'))
										<span style="font-size: 25px" class="text-success">{{Session::get('success')}}</span>
										@endif	
									</div>
								</div>

								<div class="form-group">
									<div class="col-xs-offset-3 col-xs-10">
										<input name="Submit" type="submit" value="Save" class="btn btn-primary">
									</div>
								</div>
							</form>
							<script type="text/javascript">
								$("#update_profile").validate({
									rules:{
										fullname:{
											required: true,
											maxlength: 30,
										},
										address: {
											required: true,
											maxlength: 50,
										},
										weight: {
											required: true,

										},
										job: {
											required: true,
											maxlength: 30,
										}
									},
									messages:{

									},

									errorPlacement: function(error, element) {
										error.appendTo('#error-' + element.attr('id'));
									}


								})
							</script>
						</div>
					</div>
				</div>
				@endsection