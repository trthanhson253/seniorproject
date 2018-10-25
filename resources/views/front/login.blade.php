@include('layout.header')
         
      <!-- main-body -->
      <div id="main-body" style="padding-top:20px;">
        <div class="Content">
        	@if(session('warning'))
                <ul class="alert alert-danger" style="text-align: center;color: red;font-weight: bold;">
                <li>{{session('warning')}}</li>    
                </ul>                 
            @endif
            @if(session('error'))
                <ul class="alert alert-success" style="text-align: center;color: blue;font-weight: bold;">
                <li>{{session('error')}}</li>    
                </ul>                 
            @endif
	<form action="login" method="post" class="beta-form-checkout">
				 <input type="hidden" name="_token" value="{{csrf_token()}}">	

        <div id="ctl00_ctl00_cphBody_cphBodyMain_divLogin" class="LoginBox LoginBox--existingUser">
           

    <div class="LoginBox-headerArea">

        <h1 class="LoginBox-header"><img src="frontpage/img/login.png" style="width:70px;"> Sign In</h1>
        <a class="LoginBox-tab" href="signup">Create New Account</a>

    </div>

    <div class="LoginBox-formArea">
        <div class="LoginBox-textboxArea">
            <div class="LoginBox-emailAddressWarning ErrorBox">Please enter username.</div>
            <label class="LoginBox-fallbackLabel u-hidden">Username</label>
            
            <input name="name" maxlength="200" id="" class="LoginBox-textBox tbjvFloat LoginBox-emailAddressTextbox LoginBox-emailAddressTextbox--existingUser" value="{{ old('name') }}" type="name" placeholder="Please enter your username" />
             @if ($errors->has('name'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>                                    
             @endif
            <label class="LoginBox-fallbackLabel u-hidden">Password</label>
            
            <input name="password" type="password" maxlength="25" id="" class="LoginBox-textBox tbjvFloat" placeholder="Password" />           
						 @if ($errors->has('password'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>                                    
                    @endif
        </div>
        <div class="g-recaptcha" name="captcha" data-sitekey="6LcxBkYUAAAAALGiDRKxWh6X0ENXJohF8B7GoN2b"></div>
          
        <div class="LoginBox-staySignedInArea">
            <label class="Checkbox">
              <input name="" type="checkbox" id="" class="Checkbox" checked="checked" />
              <div class="Checkbox-label">
                  <span class="LoginBox-staySignedInText">Keep me signed in</span>
                  
              </div>
              <div class="Checkbox-state"></div>
            </label>
        </div>

        <div class="LoginBox-submitArea">          
            
            <button class="search-btn btn btn-default" type="submit" style="font-weight:bold;">Sign in</button>
            <a href="#" class="LoginBox-forgotPasswordLink">Forgot Password</a>
        </div>
    </div>
 </div>      
    </form>                                                       



        
    </div>
  	  </div>


@include('layout.footer')