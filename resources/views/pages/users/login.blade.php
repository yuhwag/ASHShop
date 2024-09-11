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
            @if(Session::has('unsuccess'))
				<div class="row h5 alert alert-danger" style="color:red; text-align:center;">Wrong email or password <i class="fa fa-times"></i></div>
			@endif
			<form action="login" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				@csrf <!-- {{ csrf_field() }} -->
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4 style="text-align:center;">Log In</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="password" name="password" required>
						</div>
						<div class="form-block" style="display:flex; justify-content:center;">
							<button type="submit" class="btn btn-primary" style="background:crimson;border:none;">Login</button>
						</div>

                        <div style="text-align: center;">
                            <span class="color-gray">Do not have an account? </span><span><a href="signup" style="color:crimson; font-weight: bold; text-decoration:none;">Sign Up</a></span>
                        </div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection