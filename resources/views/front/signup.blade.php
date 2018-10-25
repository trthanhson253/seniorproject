@include('layout.header')
      <!-- main-body -->
      <div id="main-body" style="padding-top:20px;">
       <div class="Content">
        @if(session('warning'))
                <ul class="alert alert-danger" style="text-align: center;color: red;font-weight: bold;">
                <li>{{session('warning')}}</li>    
                </ul>                 
        @endif
  <form action="signup" method="post" class="beta-form-checkout">
         <input type="hidden" name="_token" value="{{csrf_token()}}"> 
        <div id="ctl00_ctl00_cphBody_cphBodyMain_divLogin" class="LoginBox LoginBox--existingUser">
           

    <div class="LoginBox-headerArea">

        
        <h1 class="LoginBox-header">Register New Account</h1>
        <a class="LoginBox-tab" href="login">Sign In</a>

    </div>

    <div class="LoginBox-formArea">
        <div class="LoginBox-textboxArea">
             <label class="LoginBox-fallbackLabel u-hidden">Name</label>              
                                                                                                                   
            <input name="name" value="{{ old('name') }}" type="text" required="required" maxlength="200" class="LoginBox-textBox tbjvFloat tbpii" placeholder="Name*" />
              @if ($errors->has('name'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>                                    
             @endif
            <label class="LoginBox-fallbackLabel u-hidden">Student ID</label>                                                       
                                         
            <input name="studentid" value="{{ old('studentid') }}" required="required" type="text" maxlength="200" class="LoginBox-textBox tbjvFloat tbpii" placeholder="Student ID*" />
             @if ($errors->has('studentid'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('studentid') }}</strong>
                    </span>                                    
             @endif
            <label class="LoginBox-fallbackLabel u-hidden">Email Address</label>
            
            <input name="email" maxlength="200" required="required" class="LoginBox-textBox tbjvFloat tbpii" value="{{ old('email') }}" type="email" placeholder="Email Address*" />
             @if ($errors->has('email'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>                                    
             @endif
        

             <label class="LoginBox-fallbackLabel u-hidden">Phone</label>                                                       
                                         
            <input name="phone" value="{{ old('phone') }}" required="required" type="number" maxlength="200" class="LoginBox-textBox tbjvFloat tbpii" placeholder="Phone*" />
             @if ($errors->has('phone'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>                                    
             @endif

            <label class="LoginBox-fallbackLabel u-hidden">Address</label>                                                       
                                         
            <input name="address" value="{{ old('address') }}" required="required" type="text" maxlength="200" class="LoginBox-textBox tbjvFloat tbpii" placeholder="Address*" />
            
            <label class="LoginBox-fallbackLabel u-hidden">Password</label>
                                                            
            <input name="password" type="password" maxlength="25" required="required" class="LoginBox-textBox tbjvFloat" placeholder="Password*" />
             @if ($errors->has('password'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>                                    
             @endif
            
            <label class="LoginBox-fallbackLabel u-hidden">Confirm Password</label>
                                                          
            <input name="retypepassword" type="password" required="required" maxlength="25" class="LoginBox-textBox tbjvFloat" placeholder="Confirm Password*" />
             @if ($errors->has('retypepassword'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('retypepassword') }}</strong>
                    </span>                                    
             @endif
             <div class="g-recaptcha" data-sitekey="6Lee2yUTAAAAAAtZXh-Eq7x47l93NN9SJOgAYl7p"></div>
        </div>

          <div class="LoginBox-submitArea">            
            
            <button class="search-btn btn btn-default" type="submit" style="font-weight:bold;">Register</button>                    
            <div class="LoginBox-rr">
                    <div class="LoginBox-optin">
                        <span><input name="ctl00$ctl00$cphBody$cphBodyMain$UserCtrlNewUser$EmailOptIn" type="checkbox" id="ctl00_ctl00_cphBody_cphBodyMain_UserCtrlNewUser_EmailOptIn" class="Checkbox" checked="checked" /> <label for="ctl00_ctl00_cphBody_cphBodyMain_UserCtrlNewUser_EmailOptIn">I agree to the <strong> terms of service.</strong></label></span>
                    </div>
                    
            </div>
           
        </div>

    </div>

</div>
</form>

        </div>

    </div>
  	  


@include('layout.footer')