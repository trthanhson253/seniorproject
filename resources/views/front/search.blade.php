@extends('master1')
@section('content')
<div class="LandingPage-modulesContainer" style="padding-left:80px;padding-right:-140px;">
		<?php
		function color($str,$key){
			return str_replace($key,"<mark><span style='color:red;text-decoration:bold;font-weight:bold;'>$key</span></mark>",$str);
		}
		 ?>		

 <div class="col-lg-9">

    <div class="LandingPage-module">
          <div class='BookSlider-alternateTitle BookSlider-outlined BookSlider-green'>
                <div class='RecSection'>
                  <div class='RecSection-sliderHeader'>
                      <h3 class="pt-2"><img src="frontpage/img/search.ico" style="width:50px;">Search Results for: <span style="color:red">"{{$key}}"</span> </h3>
                      <div id="ctl00_ctl00_cphBody_cphBodyMain_divBreadcrumbs" class="WorkBreadcrumbs-container">
                      <div class="WorkBreadcrumbs Content">
                
                <span><a >There are {{$count}} results found. </a></span> <span class='WorkBreadcrumbs-separator'></span> 
                
            </div>
          </div>
                      <hr>
                      
                  </div>

                  
                  <div class="container-fluid">
                    <div class="row">
                    	@foreach($books as $b)
                      <a href="books/{{$b->id}}">
                      <div class="col-md-3 col-sm-6 pt-2 pb-4" style="text-align: center;font-size: 11px;">
                        <img src="upload/image/{{$b->image}}" width="200px" height="240px" alt="" class="img-responsive" />
                        <div ><a class="text-dark p-2 font-weight-bold" href="books/{{$b->id}}">{!! color($b->title,$key) !!}</a></div>
                        <div ><a style="color: blue;">{!! color($b->author,$key) !!}</a></div>
                        
                      </div>
                    </a>
                      @endforeach

                    </div>
                   <div>
						{!! $books->links() !!}
					</div>

                </div> <!-- end book row-->


  </div>
</div>

                  <div class="LandingPage-module ">
                      <!-- module 21938 failed to render -->
                  </div>

                </div>
           

					
@endsection