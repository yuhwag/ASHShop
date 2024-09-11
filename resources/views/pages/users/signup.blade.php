@extends('master')
@section('content')


<div class="container">
    <div id="content">
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" style="color:red; text-align:center;">
                        {{$error}} <i class="fa fa-times"></i>
                    </div>
                @endforeach
            @endif
            @if(Session::has('success'))
				<div class="row h5 alert alert-success" style="color:green; text-align:center;">Create account successful <i class="fa fa-check"></i></div>
			@endif
			<form action="signup" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				@csrf <!-- {{ csrf_field() }} -->
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4 style="text-align:center;">Sign Up</h4>
						<div class="space20">&nbsp;</div>
						
						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="full_name">Full Name*</label>
							<input type="text" id="full_name" name="full_name" required>
						</div>

						<div class="form-block">
							<label for="address">Address*</label>
							<input type="text" id="address" name="address" required>
						</div>
                        
						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone" name="phone" required>
						</div>

						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="password" name="password" required>
						</div>

						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" id="repassword" name="repassword" required>
						</div>

						<div class="form-block" style="display:flex; justify-content:center;">
							<button type="submit" class="btn btn-primary" style="background:crimson;border:none;">Register</button>
						</div>

                        <div style="text-align: center;">
                            <span class="color-gray">Do you already have an account? </span><span><a href="login" style="color:crimson; font-weight: bold; text-decoration:none;">Log In</a></span>
                        </div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection