@extends('master')
@section('title')
Register
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<section>      
				<h1 class="entry-title"><span>Register</span> </h1>
				<hr>
				<form action="{{route('register')}}" class="form-horizontal" method="post" name="register" id="register" enctype="multipart/form-data" >
					{{ csrf_field() }}        
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label class="control-label col-sm-3">Email ID <span class="text-danger">*</span></label>
						<div class="col-md-8 col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
								<input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email ID" required="" value="{{ old('email') }}">
							</div>
							<span class="text-danger" id="error-email"></span>

							@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label class="control-label col-sm-3">Set Password <span class="text-danger">*</span></label>
						<div class="col-md-8 col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" class="form-control" name="password" id="password" placeholder="Choose password (6-20 chars)" value="" required>
							</div>
							<span class="text-danger" id="error-password"></span>
							@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif   
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Confirm Password <span class="text-danger">*</span></label>
						<div class="col-md-8 col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm your password" value="" required>
							</div>  
							<span class="text-danger" id="error-cpassword"></span>
						</div>
					</div>

					<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
						<label class="control-label col-sm-3">Username <span class="text-danger">*</span></label>
						<div class="col-md-8 col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="{{ old('username') }}" required>
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
								<input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter Full Name" value="{{ old('fullname') }}" required>
							</div>
							<span class="text-danger" id="error-fullname"></span>
							@if ($errors->has('fullname'))
							<span class="help-block">
								<strong>{{ $errors->first('fullname') }}</strong>
							</span>
							@endif
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-3">Aim <span class="text-danger">*</span></label>
						<div class="col-md-8 col-sm-9">
							<label><input name="aim" type="radio" value="1" checked> Practice </label><br>
							<label><input name="aim" type="radio" value="2" > Coach </label><br>
							<label><input name="aim" type="radio" value="3" > Both </label>
							   
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-offset-3 col-xs-10">
							<input name="Submit" type="submit" value="Sign Up" class="btn btn-primary">
						</div>
					</div>
				</form>
				
				<script type="text/javascript">
					$("#register").validate({
						rules:{
							email:{
								required:true,
								email:true,
							},
							password:{
								required:true,
								minlength:6,
								maxlength:20,
							},
							cpassword:{
								required:true,
								equalTo:"#password",
							},
							username:{
								required:true,
								maxlength:20,
							},
							fullname:{
								required:true,
								maxlength:30,
							},
						},
						messages:{

						},
						
						errorPlacement: function(error, element) {
							error.appendTo('#error-' + element.attr('id'));
						}
						

					})
				</script>


				<div class="form-group">
					<div class="col-md-12 control">
						<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
							@if(Session::has('success'))<div class="alert alert-success" align="center">{{ Session::get('success')}}</div>
							@else {{"Already have an account"}}
							@endif&nbsp;&nbsp;&nbsp;
							<a href="{{route('login')}}" style="font-size: 15px">
								Login now
							</a>
						</div>
					</div>
				</div> 

			</div>
		</div>
	</div>
	@endsection