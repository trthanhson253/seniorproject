@include('layout.header')
        
      
     

      <!-- carousel slides -->
      <!-- <div id="demo" class="carousel slide container-fluid-fluid d-none d-sm-block" data-ride="carousel" style="position: relative; opacity: 0.9; padding-left:0; padding-right: 0;">
        <ul class="carousel-indicators" style="bottom:-50px;">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="frontpage/img/carousel-2.png" alt="library" width="100%" height="300">
            <div class="carousel-caption text-justify-end">
              <h1 class="text-white"> Welcome to The Online Library System</h1>
            </div>
          </div>
          <div class="carousel-item">
            <img src="frontpage/img/carousel.jpg" alt="library" width="100%" height="300">
          </div>
          <div class="carousel-item">
            <img src="frontpage/img/carousel-1.jpg" alt="" width="100%" height="300">
          </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
        <a href="#demo" class="carousel-control-next" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div> -->
    </div> <!-- end carousel-->

      
      <!-- main-body -->
      <div id="main-body" style="padding-top:20px;">
        <div class="container-fluid">
         <div class="Content LandingPage-content">


          
           @include('layout.menu')

                    
                        <div class="LandingPage-modulesContainer" style="padding-left:80px;">
                
                
 <div class="col-lg-9">

   
<div class="LandingPage-module ">

          <div class='BookSlider-alternateTitle BookSlider-outlined BookSlider-green'>
 
                <div class='RecSection'>
                   
                    
                    <div class='RecSection-sliderHeader'>
                        <h3 class="pt-2" style=" font-weight: bold;" ><img src="frontpage/img/book2.png" style="width:70px;"> Newest<span style="color: red;">Books</span></h3>
                        
                    </div>
            <div class="slider">
               @foreach($newestbooks as $n)
                    <li class="slide1">
                        <a href="books/{{$n->id}}">
                        <img src="upload/image/{{$n->image}}" alt="" class="img-responsive" />
                        <div ><a class="text-secondary text-left font-weight-bold" href="books/{{$n->id}}">{{$n->title}}</a></div>
                      </a>
                        
                    </li>
                @endforeach
            </div>


      </div>

  </div>

</div>


<div class="LandingPage-module ">
          <div class='BookSlider-alternateTitle BookSlider-outlined BookSlider-green'>
            
                <div class='RecSection'>
                    @foreach($cates as $ct)
                      @if(count($ct->books)>0)
                    <div class='RecSection-sliderHeader'>
                     @if($ct->id%2==0)                       
                        <h4 class='RecSection-title'><span><span><img src="frontpage/img/book3.png" style="width:50px;"> {{$ct->name}}</span><span></span></span></h4>
                     @else
                        <h4 class='RecSection-title'><span><span></span><span><img src="frontpage/img/book4.jpg" style="width:50px;"> {{$ct->name}}</span></span></h4>
                     @endif
                        
                        <p class='RecSection-subtitle' style="border-radius: 5px;background:#232F3E;color:#febc11;"><span>There are {{count($ct->books)}} books found in this category</span><a class='RecSection-viewAll' href="cates/{{$ct->id}}">View All</a></p>
                    </div>
                    <?php
                        $bks=$ct->books->sortByDesc('created_at')->take(20);
                    ?>  
            
                  <div class="slider">
                    @foreach($bks->all() as $b)
                    <li class="slide1">
                          <a class='BookSlider-slide swiper-slide' href="books/{{$b['id']}}">
                              <div class='BookSlider-contentContainer' style="height: 270px; width: 170px;">
                                  <div class='BookSlider-border'>
                                      <div class='BookSlider-imagePadding'>
                                          <div class='BookSlider-imageContainer'>
                                              <div class='BookSlider-padding'></div>
                                              <img alt="{{$b['title']}}" class='BookSlider-image' src="upload/image/{{$b->image}}" />
                                          </div>
                                      </div>
                                      <div class='BookSlider-content'>
                                          <p class='BookSlider-title'>{{$b['title']}}</p>
                                          <p class='BookSlider-author' >{{$b['author']}}</p>
                                          
                                      </div>
                                  </div>
                              </div>
                          </a>
                    </li>
                    @endforeach 
                  </div>
                   @endif
              @endforeach 
      </div>
       
  </div>
</div>






                    
                </div>
            </div>

            <div style="clear:both;"></div>

                    
                        
            

        </div>
    </div>
  </div>


@include('layout.footer')