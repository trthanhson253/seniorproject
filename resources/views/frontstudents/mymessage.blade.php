@extends('frontstudents.index')
@section('content')
<div class="LandingPage-modulesContainer" style="padding-left:80px;padding-right:-140px;">


 <div class="col-lg-9">

    <div class="LandingPage-module">
          <div class='BookSlider-alternateTitle BookSlider-outlined BookSlider-green'>
                <div class='RecSection'>
                  <div class='RecSection-sliderHeader'>
                      <h3 class="pt-2"><a style="color:black;">MY MESSAGES</a></h3>
                      <div id="ctl00_ctl00_cphBody_cphBodyMain_divBreadcrumbs" class="WorkBreadcrumbs-container">
                      <div class="WorkBreadcrumbs Content">
                
                <span style="font-size: 16px;"><a>You have {{$count}} new message from librarian</a></span> <span class='WorkBreadcrumbs-separator'></span> 
                
            </div>
          </div>
                      <br>
                      
                  </div>

                  
                  <div class="container-fluid">
                                 	
                     
            @foreach($message as $m)
                            
                      @if($m->status==0)
                      <fieldset style="width: 100%;border-radius: 5px;border-color: red;">
                     <img src="frontpage/img/closed.png" alt="img" width="50" height="50"> <strong style="color: blue;">New Message</strong> 
                                  <div>Posted by <strong>{{$m->user->name}} on {{$m->created_at}}</strong></div>
                                  <div>Status: <strong>Unread</strong></div>
                                   <h5 class>Content: </h5>
                                   <fieldset style="font-size: 14px;font-weight: bold;background-color:grey;border-radius: 4px;">{{$m->content}}</fieldset>
                                   <br>
                                    <form action="students/mymessage/{{$m->id}}" method="POST" role="form" enctype="multipart/form-data">  
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                                      <button>Mark as read</button>
                                   </form>
                                 </fieldset>
                        @else()
                        <fieldset style="width: 100%;border-radius: 5px;">
                      <img src="frontpage/img/opened.png" alt="img" width="80" height="60"> <strong>Old Message</strong> 
                                  <div>Posted by <strong>{{$m->user->name}} on {{$m->created_at}}</strong></div>
                                  <div>Status: <strong>Read</strong></div>         
                                   <h5 class>Content: </h5>
                                   <fieldset style="font-size: 14px;font-weight: bold;border-radius: 4px;">{{$m->content}}</fieldset>
                                   <br>
                           </fieldset>        
                        @endif                          
                        <br>
                        <br>
         @endforeach    
                     

                    
                </div> <!-- end book row-->
               

  </div>
</div>

                  <div class="LandingPage-module ">
                      <!-- module 21938 failed to render -->
                  </div>

                </div>
@endsection