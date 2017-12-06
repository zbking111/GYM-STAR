@extends('master')
@section('title')
Login
@endsection
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<section>      
				<h1 class="entry-title"><span>Login</span> </h1>
				<hr>
				<form action="{{route('login')}}" class="form-horizontal" method="post" name="register" id="register" enctype="multipart/form-data" >
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
						<label class="control-label col-sm-3">Password <span class="text-danger">*</span></label>
						<div class="col-md-8 col-sm-9">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" class="form-control" name="password" id="password" placeholder="Enter password (6-20 chars)" value="" required>
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
						<div class="col-xs-offset-3 col-xs-10">
							@if(Session::has('message'))
							<span class="text-danger">{{Session::get('message')}}</span>
							@endif	
						</div>
					</div>
					

					<div class="form-group">
						<div class="col-xs-offset-3 col-xs-10">
							<input name="Submit" type="submit" value="Login" class="btn btn-primary">
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
							Do not have an account?&nbsp;&nbsp;&nbsp;
							<a href="{{route('register')}}" style="font-size: 15px">
								Register now
							</a>
						</div>
					</div>
				</div> 

			</div>
		</div>
	</div>
	@endsection