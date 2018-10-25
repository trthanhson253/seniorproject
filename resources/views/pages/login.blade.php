@extends('master')
@section('content')
			
			@if(session('warning'))
                <ul class="error_msg">
                <li>{{session('warning')}}</li>    
                </ul>                 
            @endif
			
			<form action="login" method="post" class="beta-form-checkout">

				 <input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Log In</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<input type="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Username"/>
						</div>
						 @if ($errors->has('name'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>                                    
                    @endif
						<div class="form-block">
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
						 @if ($errors->has('password'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>                                    
                    @endif
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Log in</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		

@endsection