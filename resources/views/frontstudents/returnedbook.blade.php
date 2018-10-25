@extends('frontstudents.index')
@section('content')
<div class="LandingPage-modulesContainer" style="padding-left:80px;padding-right:-140px;">


 <div class="col-lg-9">

    <div class="LandingPage-module">
          <div class='BookSlider-alternateTitle BookSlider-outlined BookSlider-green'>
                <div class='RecSection'>
                  <div class='RecSection-sliderHeader'>
                      <h3 class="pt-2"><a style="color:black;">MY RETUNRED BOOKS HISTORY</a></h3>
                      <div id="ctl00_ctl00_cphBody_cphBodyMain_divBreadcrumbs" class="WorkBreadcrumbs-container">
                      <div class="WorkBreadcrumbs Content">
                 <?php                           
                        $unpaidfines = DB::table('returns')->where('studentid',Auth::guard('students')->user()->id)->where('paid',0)->count('*');      
                  ?>
                <span style="font-size: 16px;"><a>You have {!!$unpaidfines!!} unpaid fines in record</a></span> <span class='WorkBreadcrumbs-separator'></span> 
                
            </div>
          </div>
                      <br>
                      
                  </div>

                  
                  <div class="container-fluid">
                                 	
                     
            @foreach($returns as $r)
                            <table style="width: 100%;">

                            @if($r->paid==1)
                            <thead style="background-color: #1A82C3;color:white;border-color: white;">
                                <tr>
                                    <th style="border-radius: 7px;"><span>Number of Due Days:  <?php
                                        $date1 = new DateTime($r->created_at);
                                        $date2 = new DateTime($r->duedate);
                                        if($date1>$date2){
                                            $diff = date_diff($date1,$date2);                    
                                            echo $diff->format("%a");
                                        }else{
                                            echo "0";
                                        }                                    
                                        ?></span><span style="float:right;"> PAID FINES</span></th>                                   
                                    
                                </tr>
                            </thead>
                            @else
                            <thead style="background-color: red;color:white;border-color: white;">
                                <tr>
                                    <th style="border-radius: 7px;"><span>Number of Due Days:   <?php
                                        $date1 = new DateTime($r->created_at);
                                        $date2 = new DateTime($r->duedate);
                                        if($date1>$date2){
                                            $diff = date_diff($date1,$date2);                    
                                            echo $diff->format("%a");
                                        }else{
                                            echo "0";
                                        }                                    
                                        ?></span><span style="float:right;"> UNPAID FINES

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
                                        <img src="upload/image/{{$r->books->image}}" alt="img" width="100" height="150">
                                    </div>

                            <div class="ShoppingCartItem-content">
                                <div class="ShoppingCartItem-details">
                                    <a class="ShoppingCartItem-title" href="books/{{$r->books->id}}">{{$r->books->title}}</a>
                                    
                                    
                                    <div class="ShoppingCartItem-format">ISBN: <strong>{{$r->books->isbn}}</strong></div>
                                    <div class="ShoppingCartItem-format">Author: <strong>{{$r->books->author}}</strong></div>
                                    
                                    <div class="ShoppingCartItem-format">Date Borrowed: <strong>{{$r->borroweddate}}</strong></div>
                                    <div class="ShoppingCartItem-format">Due Date: <strong>{{$r->duedate}}</strong></div>
                                    <div class="ShoppingCartItem-format">Date Return: <strong>{{$r->created_at}}</strong></div>
                                     <div class="ShoppingCartItem-format">Estimated Fines Amount: <strong><?php
                                        $date1 = new DateTime($r->created_at);
                                        $date2 = new DateTime($r->duedate);
                                        if($date1>$date2){
                                            $diff = date_diff($date1,$date2);
                                            if($diff->format("%a")*0.5<=35 && $diff->format("%a")<40){
                                                echo 
                                                "$".$diff->format("%a")*0.5;
                                            }else{
                                                echo 
                                                "$35.00";
                                            }              
                                            
                                        }else{
                                            echo  "NO PENALTY";
                                        }                                    
                                        ?></strong></div>
                                         <div class="ShoppingCartItem-format">Final Fines Amount: <strong>{{$r->notes}}</strong></div>
                                </div>
                               
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