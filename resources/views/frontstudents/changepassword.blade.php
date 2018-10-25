@extends('frontstudents.index')
@section('content')
<div class="LandingPage-modulesContainer" style="padding-left:80px;padding-right:-140px;">


 <div class="col-lg-9">

    <div class="LandingPage-module">
          <div class='BookSlider-alternateTitle BookSlider-outlined BookSlider-green'>
                <div class='RecSection'>
                  <div class='RecSection-sliderHeader'>
                        @if(session('error'))
                                <ul class="alert alert-danger">
                                <li>{{session('error')}}</li>    
                                </ul>                 
                            @endif
                      <h3 class="pt-2"><a style="color:black;">CHANGE MY PASSWORD</a></h3>
                      <div id="ctl00_ctl00_cphBody_cphBodyMain_divBreadcrumbs" class="WorkBreadcrumbs-container">
                      <div class="WorkBreadcrumbs Content">
                
                <span style="font-size: 16px;"><a>{{Auth::guard('students')->user()->name}}</a></span> <span class='WorkBreadcrumbs-separator'></span> 
                
            </div>
          </div>
                      <br>
                      
                  </div>

                  
                  <div class="container-fluid">
                                  
                     <fieldset style="width: 100%;border-radius: 5px;border-color: blue;">
                       <div class="AccountPersonalInfo">
        
        
        <h2>Update Password</h2>
        <form action="students/changepassword/{{$student->id}}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
        
            <div class="Input-container has-content">
                <input type="password" name="oldpassword" required="required" value="" maxlength="200" class="Input tbpii" style="width:400px;">
                  @if ($errors->has('oldpassword'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('oldpassword') }}</strong>
                    </span>                                    
                  @endif
                <label class="Input-label">Current Password:<span class="Input-required">*</span></label>           
            </div>

            <div class="Input-container has-content">
                <input type="password" name="password" required="required" value="" required="required" maxlength="200" class="Input tbpii" style="width:400px;">
                  @if ($errors->has('password'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>                                    
                  @endif
                <label class="Input-label">New Password:<span class="Input-required">*</span></label>           
            </div>
            <div class="Input-container has-content">
                <input type="password" name="retypepassword" required="required" value="" maxlength="200" class="Input tbpii" style="width:400px;">
                  @if ($errors->has('retypepassword'))
                    <span style="color:red;" >                   
                        <strong>{{ $errors->first('retypepassword') }}</strong>
                    </span>                                    
                  @endif
                <label class="Input-label">Re-type New Password:<span class="Input-required">*</span></label>           
            </div>
             
            <br><br>
            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-edit"></i> UPDATE </button>
       </form> 
    </div>
        
        
        
    </div>
                                    
                                   

                    </fieldset>

                </div> <!-- end book row-->
               

  </div>
</div>

                  <div class="LandingPage-module ">
                      <!-- module 21938 failed to render -->
                  </div>

                </div>
@endsection