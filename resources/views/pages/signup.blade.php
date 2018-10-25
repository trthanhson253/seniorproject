@extends('master')
@section('content')
 <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
		            @if(session('warning'))
		                <ul class="alert alert-success">
		                <li>{{session('warning')}}</li>    
		                </ul>                 
		            @endif
		             @if(session('error'))
		                <ul class="alert alert-danger">
		                <li>{{session('error')}}</li>    
		                </ul>                 
		            @endif
				  	<div class="panel-heading">Student Registration</div>
				  	<div class="panel-body">
				    	<form class="form-signin" action="signup" method="post" >
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
				    		<div>
				    			<label>Full Name:*</label>
							  	<input type="text" class="form-control" placeholder="Full Name" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email*:</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>
				    			<label>Student ID*:</label>
							  	<input type="text" class="form-control" placeholder="Student ID" name="studentid" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>
				    			<label>Phone:</label>
							  	<input type="text" class="form-control" placeholder="Phone" name="phone" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>
				    			<label>Address:</label>
							  	<input type="text" class="form-control" placeholder="Address" name="address" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>		
							<div>
								<input type="checkbox" class="" name="checkpassword">
				    			<label>Password*:</label>
							  	<input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Retype Password*:</label>
							  	<input type="password" class="form-control" placeholder="Retype Password" name="retypepassword" aria-describedby="basic-addon1">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Register
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
@endsection