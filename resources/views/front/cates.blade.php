@extends('master1')
@section('content')
<div class="LandingPage-modulesContainer" style="padding-left:80px;padding-right:-140px;">


 <div class="col-lg-9">

    <div class="LandingPage-module">
          <div class='BookSlider-alternateTitle BookSlider-outlined BookSlider-green'>
                <div class='RecSection'>
                  <div class='RecSection-sliderHeader'>
                      <h3 class="pt-2"><a href="cates/{{$ct->id}}" style="color:black;" >{{$ct->name}}</a></h3>
                      <div id="ctl00_ctl00_cphBody_cphBodyMain_divBreadcrumbs" class="WorkBreadcrumbs-container">
                      <div class="WorkBreadcrumbs Content">
                @foreach($subcates as $s)
                <span><a href="cates/subcates/{{$s->id}}">{{$s->name}}</a></span> <span class='WorkBreadcrumbs-separator'>|</span> 
                @endforeach
            </div>
          </div>
                      <hr>
                      
                  </div>

                  <!-- co nhieu book cu tiep tuc bo het vo-->
                  <div class="container-fluid">
                    <div class="row">
                    	@foreach($books as $b)
                      <a href="books/{{$b->id}}">
                      <div class="col-md-3 col-sm-6 pt-2 pb-4" style="text-align: center;font-size: 11px;">
                        <img src="upload/image/{{$b->image}}" width="200px" height="240px" alt="" class="img-responsive" />
                        <div ><a class="text-dark p-2 font-weight-bold" href="books/{{$b->id}}">{{$b->title}}</a></div>
                        <div ><a style="color: blue;">{{$b->author}}</a></div>
                        
                      </div>
                    </a>
                      @endforeach

                    </div>

                </div> <!-- end book row-->


  </div>
</div>

                  <div class="LandingPage-module ">
                      <!-- module 21938 failed to render -->
                  </div>

                </div>
           

					
@endsection