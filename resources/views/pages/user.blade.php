@extends('master')
@section('content')

<div class="container">
		<div id="content">
			@if(session('warning'))
                <ul class="error_msg">
                <li>{{session('warning')}}</li>    
                </ul>                 
            @endif
			<form action="user" method="post" class="beta-form-checkout">
				 <input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>User Profile</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Name</label>
							<input type="text" name="name" value="{{$user->name}}" id="your_last_name" readonly="{{$user->name}}">
						</div>
						
						<div class="form-block">
							<label for="email">Email address</label>
							<input type="email" name="email" value="{{$user->email}}" id="email" required>
						</div>
						@if ($errors->has('email'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>                                    
                    @endif

						<div class="form-block">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" required>
						</div>
						@if ($errors->has('password'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>                                    
                    @endif
						<div class="form-block">
							<label for="repassword">Retype password</label>
							<input type="password" name="repassword" id="repassword" required>
						</div>
						@if ($errors->has('repassword'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('repassword') }}</strong>
                    </span>                                    
                    @endif
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Change</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	<div><a href="borrowlist/{{$user->id}}"><p style="color: red;">See Borrow Lists</p></a></div>
@endsection