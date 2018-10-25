@extends('frontstudents.index')
@section('content')
<div class="LandingPage-modulesContainer" style="padding-left:80px;padding-right:-140px;">


 <div class="col-lg-9">

    <div class="LandingPage-module">
          <div class='BookSlider-alternateTitle BookSlider-outlined BookSlider-green'>
                <div class='RecSection'>
                  <div class='RecSection-sliderHeader'>
                      <h3 class="pt-2"><a style="color:black;">MY BORROWING BOOKS</a></h3>
                      <div id="ctl00_ctl00_cphBody_cphBodyMain_divBreadcrumbs" class="WorkBreadcrumbs-container">
                      <div class="WorkBreadcrumbs Content">
                
                <span style="font-size: 16px;"><a>{{Auth::guard('students')->user()->name}}</a></span> <span class='WorkBreadcrumbs-separator'></span> 
                
            </div>
          </div>
                      <br>
                      
                  </div>

                  
                  <div class="container-fluid">
                                 	
                     
            @foreach($issue as $i)
                            <table style="width: 100%;">

                            @if($i->returndate>$now)
                            <thead style="background-color: #1A82C3;color:white;border-color: white;">
                                <tr>
                                    <th style="border-radius: 7px;"><span>Issue Date: {{$i->created_at}}</span><span style="float:right;"> Due Date: {{$i->returndate}}</span></th>                                   
                                    
                                </tr>
                            </thead>
                            @else
                            <thead style="background-color: red;color:white;border-color: white;">
                                <tr>
                                    <th style="border-radius: 7px;"><span>Due Date: {{$i->returndate}}</span><span style="float:right;"> Number of Due Days: 
                                      <?php
                                        $date1 = new DateTime($now);
                                        $date2 = new DateTime($i->returndate);
                                        if($date1>$date2){
                                            $diff = date_diff($date1,$date2);                    
                                            echo $diff->format("%a");
                                        }else{
                                            echo "0";
                                        }                                    
                                        ?>

                                    </span></th>                                   
                                    
                                </tr>
                            </thead>
                            @endif
                            

                            <tbody style="background-color: : white;">
                            
                            <tr>
                                <td>
                  <div class="ShoppingCart-content">
                    <div class="ShoppingCart-items">
                   
                     <div class="ShoppingCartItem">
                                    <div class="ShoppingCartItem-image">
                                        <img src="upload/image/{{$i->books->image}}" alt="img" width="100" height="150">
                                    </div>

                            <div class="ShoppingCartItem-content">
                                <div class="ShoppingCartItem-details">
                                    <a class="ShoppingCartItem-title" href="books/{{$i->books->id}}">{{$i->books->title}}</a>
                                    
                                    
                                    <div class="ShoppingCartItem-format">ISBN: <strong>{{$i->books->isbn}}</strong></div>
                                    <div class="ShoppingCartItem-format">Author: <strong>{{$i->books->author}}</strong></div>
                                    <div class="ShoppingCartItem-format">Pulisher: <strong>{{$i->books->publisher}}</strong></div>
                                </div>
                                @if($i->returndate>$now)
                                <img src="frontpage/img/valid.png" alt="img" width="150" height="150">
                                @else
                                <img src="frontpage/img/expired.gif" alt="img" width="150" height="150">
                                @endif
                                <span style="font-weight: bold;">
                                  <?php
                                        $date1 = new DateTime($i->returndate);
                                        $date2 = new DateTime($now);
                                        if($date1>$date2){
                                            $diff = date_diff($date1,$date2);                    
                                            echo "Time Left To Return This Books: ".$diff->format("%a")." days";
                                        }else{
                                            echo "The due date has passed. You need to return this book now.";
                                        }                                    
                                        ?>  
                                      </span>
                                
                                
                            </div>
                            
                            
                        </div>
                  
                     
                             
                            
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