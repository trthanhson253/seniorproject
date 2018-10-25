@extends('frontstudents.index')
@section('content')
<div class="LandingPage-modulesContainer" style="padding-left:80px;padding-right:-140px;">


 <div class="col-lg-9">

    <div class="LandingPage-module">
          <div class='BookSlider-alternateTitle BookSlider-outlined BookSlider-green'>
                <div class='RecSection'>
                  <div class='RecSection-sliderHeader'>
                            
                      <h3 class="pt-2"><a style="color:black;">EDIT PROFILE</a></h3>
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
        
        
        <h2>Update Personal Information</h2>
        <form action="students/edit/{{$student->id}}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
        
            <div class="Input-container has-content">
                <input type="text" name="name" disabled="disabled" value="{{$student->name}}" maxlength="200" class="Input tbpii" style="width:400px;">
                <label class="Input-label">Username<span class="Input-required">*</span></label>           
            </div>
            <div class="Input-container has-content">
                <input type="text" name="studentid" disabled="disabled" value="{{$student->student_id}}" required="required" maxlength="200" class="Input tbpii" style="width:400px;">
                <label class="Input-label">Student ID<span class="Input-required">*</span></label>           
            </div>
            <div class="Input-container has-content">
                <input type="email" name="email" required="required" value="{{$student->email}}" maxlength="200" class="Input tbpii" style="width:400px;">
                <label class="Input-label">Email<span class="Input-required">*</span></label>           
            </div>
             <div class="Input-container has-content">
                <input type="number" name="phone" required="required" value="{{$student->phone}}" maxlength="200" class="Input tbpii" style="width:400px;">
                <label class="Input-label">Phone</label>           
            </div>
             <div class="Input-container has-content">
                <input type="text" name="address" required="required" value="{{$student->address}}" maxlength="200" class="Input tbpii" style="width:400px;">
                <label class="Input-label">Address</label>           
            </div>
            <div class="Input-container has-content">
              <label class="Input-label">Picture:(Optional)</label>      
                <br>
              @if($student->image)
                                           <img src="upload/student/{{$student->image}}" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                        @else
                                            
                                        
                                         <img src="admin/image/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                        @endif
                <input type="file" name="image" value="{{$student->image}}" maxlength="200" class="Input tbpii" style="width:400px;">
                

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