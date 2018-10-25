@extends('frontstudents.index')
@section('content')
<div class="LandingPage-modulesContainer" style="padding-left:80px;padding-right:-140px;">


 <div class="col-lg-9">

    <div class="LandingPage-module">
          <div class='BookSlider-alternateTitle BookSlider-outlined BookSlider-green'>
                <div class='RecSection'>
                  <div class='RecSection-sliderHeader'>
                      <h3 class="pt-2"><a style="color:black;">MY REQUESTS HISTORY</a></h3>
                      <div id="ctl00_ctl00_cphBody_cphBodyMain_divBreadcrumbs" class="WorkBreadcrumbs-container">
                      <div class="WorkBreadcrumbs Content">
                
                <span style="font-size: 16px;"><a>{{Auth::guard('students')->user()->name}}</a></span> <span class='WorkBreadcrumbs-separator'></span> 
                
            </div>
          </div>
                      <br>
                      
                  </div>

                  
                  <div class="container-fluid">
                                 	
                     
        @foreach($orders as $o)
                            <table style="width: 100%;">

                            @if($o->status==1) 
                            <thead style="background-color: #1A82C3;color:white;border-color: white;">
                                <tr>
                                    <th style="border-radius: 7px;"><span>Request's Date: {{$o->created_at}}</span><span style="float:right;"> COMPLETED</span></th>                                   
                                    
                                </tr>
                            </thead>
                            @elseif($o->status==0)
                            <thead style="background-color: red;color:white;border-color: white;">
                                <tr>
                                    <th style="border-radius: 7px;"><span>Request's Date: {{$o->created_at}}</span><span style="float:right;"> PROCESSING</span></th>                                   
                                    
                                </tr>
                            </thead>
                            @endif


                            <tbody style="background-color: : white;">
                            
                            <tr>
                                <td>
                  <div class="ShoppingCart-content">
                    <div class="ShoppingCart-items">
                    @foreach($o->orderdetails as $od)    
                     <div class="ShoppingCartItem">
                                    <div class="ShoppingCartItem-image">
                                        <img src="upload/image/{{$od->books->image}}" alt="img" width="100" height="150">
                                    </div>

                            <div class="ShoppingCartItem-content">
                                <div class="ShoppingCartItem-details">
                                    <a class="ShoppingCartItem-title" href="books/{{$od->books->id}}">{{$od->books->title}}</a>
                                    
                                    
                                    <div class="ShoppingCartItem-format">ISBN: <strong>{{$od->books->isbn}}</strong></div>
                                    <div class="ShoppingCartItem-format">Author: <strong>{{$od->books->author}}</strong></div>
                                    <div class="ShoppingCartItem-format">Pulisher: <strong>{{$od->books->publisher}}</strong></div>
                                </div>
                                
                            </div>
                            
                            
                        </div>
                    @endforeach
                           
                     
                             
                            
                    </div>
                </div>
            

       </td>
                                
  </tr>
                                                        
                                                 
 </tbody>
 </table>
         @endforeach    
                     

                    
                </div> <!-- end book row-->
               

  </div>
</div>

                  <div class="LandingPage-module ">
                      <!-- module 21938 failed to render -->
                  </div>

                </div>
@endsection