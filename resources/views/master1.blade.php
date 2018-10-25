@include('layout.header')
        
      
      
      <!-- main-body -->
      <div id="main-body" style="padding-top:20px;">
        <div class="container-fluid">
         <div class="Content LandingPage-content">
            
            @include('layout.menu')

                    
                        @yield('content')
                    
                        
            

        </div>
    </div>
  </div>



@include('layout.footer')