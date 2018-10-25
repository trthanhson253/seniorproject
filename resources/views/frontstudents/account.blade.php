@extends('frontstudents.index')
@section('content')
<div class="LandingPage-modulesContainer" style="padding-left:80px;padding-right:-140px;">


 <div class="col-lg-9">

    <div class="LandingPage-module">
          <div class='BookSlider-alternateTitle BookSlider-outlined BookSlider-green'>
                <div class='RecSection'>
                  <div class='RecSection-sliderHeader'>
                    @if(session('warning'))
                                <ul class="alert alert-success">
                                <li>{{session('warning')}}</li>    
                                </ul>                 
                            @endif
                      <h3 class="pt-2"><a style="color:black;">MY ACCOUNT</a></h3>
                      <div id="ctl00_ctl00_cphBody_cphBodyMain_divBreadcrumbs" class="WorkBreadcrumbs-container">
                      <div class="WorkBreadcrumbs Content">
                
                <span style="font-size: 16px;"><a>{{Auth::guard('students')->user()->name}}</a></span> <span class='WorkBreadcrumbs-separator'></span> 
                
            </div>
          </div>
                      <br>
                      
                  </div>

                  
                  <div class="container-fluid">
                                 	
                     <fieldset style="width: 100%;border-radius: 5px;border-color: green;">
                    	
                      	<table style="width:100%;border:0;" align="center">
							  <tr>
							    <th style="width: 250px;">Your Profile Picture</th>							    				    
							    <td>Name: <strong>{{Auth::guard('students')->user()->name}}</strong></td>
							  </tr>
							  <tr>
							  	<th rowspan="5">
							  		@if(Auth::guard('students')->user()->image=="")
                                    <img src="admin/image/user.png" width="200px" height="200px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                    @else                                 
                                    <img src="upload/student/{{Auth::guard('students')->user()->image}}" width="200px" height="200px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                    @endif

							  	</th>
							    <td>Student ID: <strong>{{Auth::guard('students')->user()->student_id}}</strong></td>
							  </tr>
							  <tr>
							    <td>Email: <strong>{{Auth::guard('students')->user()->email}}</strong>
							  </tr>
							   <tr>
							   <td>Address: <strong>{{Auth::guard('students')->user()->address}}</strong>
							  </tr>
							  <tr>
							   <td>Phone: <strong>{{Auth::guard('students')->user()->phone}}</strong>
							  </tr>
							  <tr>
							   <td>Status: <strong>{{Auth::guard('students')->user()->paid}}</strong>
							  </tr>
							</table>

                    </fieldset>

                </div> <!-- end book row-->
               

  </div>
</div>

                  <div class="LandingPage-module ">
                      <!-- module 21938 failed to render -->
                  </div>

                </div>
@endsection