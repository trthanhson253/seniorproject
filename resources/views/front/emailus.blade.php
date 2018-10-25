@include('layout.header')
         
      <!-- main-body -->
      <div id="main-body" style="padding-top:20px;">
        <div class="Content">
             <h1 class="ContactUs-title"><img src="frontpage/img/emailus2.png" width="80px"> Email a Librarian </h6>
             <p><strong>Library staff will respond as soon as possible, usually within 24 hours, Monday-Friday.
</strong></p>
                <div class="u-horizontalDivider ContactUs-headerDivider"></div>
                        @if(session('warning'))
                                <ul class="alert alert-success">
                                <li style="font-weight: bold;text-align: center;color: blue;">{{session('warning')}}</li>    
                                </ul>                 
                            @endif
                    <form action="emailus" method="post" class="beta-form-checkout">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">   
        	               <div id="ContactUsForm" class="ContactUs-formContainer">
                            <div data-reactid=".b">
                                <div class="ContactUs-form ContactUs-form--customerservice">
                                   <div class="Input-container has-border">
                                     <input type="text" name="name" maxlength="200" class="LoginBox-textBox tbjvFloat LoginBox-emailAddressTextbox LoginBox-emailAddressTextbox--existingUser" placeholder="Your Name*" required />
                                   </div>

                                   <div class="Input-container has-border">
                                     <input type="text" name="studentid" maxlength="200" class="LoginBox-textBox tbjvFloat LoginBox-emailAddressTextbox LoginBox-emailAddressTextbox--existingUser" placeholder="Your Student ID*" required />
                                   </div>

                                   <div class="Input-container has-border">
                                     <input type="email" name="email" maxlength="200" class="LoginBox-textBox tbjvFloat LoginBox-emailAddressTextbox LoginBox-emailAddressTextbox--existingUser" placeholder="Your Email Address*" required />
                                   </div>

                                   <div class="Input-container has-border">
                                     <input type="text" name="subject" maxlength="200" class="LoginBox-textBox tbjvFloat LoginBox-emailAddressTextbox LoginBox-emailAddressTextbox--existingUser" placeholder="Your Subject" required />
                                   </div>

                                   <div class="Input-container has-border">
                                   <span>Question/Comment</span>
                                    <span class="Input-required">*</span>
                                    <textarea name="content" required></textarea>
                                    </div>

                                    <div class="LoginBox-submitArea">          
            
                                    <button class="search-btn btn btn-default" type="submit" style="font-weight:bold;">Submit</button>
                                   
                                    </div>
                              </div>
                          </div>
                      </div>

            </form>      
           
        
    </div>
</div>


@include('layout.footer')