@include('layout.header')
         
      <!-- main-body -->
      <div id="main-body" style="padding-top:20px;">
        <div class="Content">
            <div class="ShoppingCart">  
            <div class="Content ShoppingCartPage">
                <h4>Request Detail >> Confirm</h4>
                
               
    <hr>

        <div id="ctl00_ctl00_cphBody_cphBodyMain_divCartYourOrder" class="ShoppingCart-order">

            <div class="ShoppingCart-contentContainer Mobile-content">
                <h2>Borrower's Information</h2>
                
                    <div>Student Name: <strong>{{Auth::guard('students')->user()->name}}</strong></div>
                    <div>Student ID: <strong> {{Auth::guard('students')->user()->student_id}} </strong></div>
                    <div>Email: <strong> {{Auth::guard('students')->user()->email}} </strong></div>
                    <div>Address: <strong> {{Auth::guard('students')->user()->address}} </strong></div>
                    <div>Phone: <strong>{{Auth::guard('students')->user()->phone}} </strong></div>
                <hr>
                <div class="ShoppingCart-content">
                    <h2>Request Details</h2>
                    <div class="ShoppingCart-items">
                     @foreach(Cart::content() as $row)   
                     <div class="ShoppingCartItem">
                                    <div class="ShoppingCartItem-image">
                                        <img src="{!!url('upload/image/'.$row->options->img)!!}" alt="img" width="100" height="150">
                                    </div>

                            <div class="ShoppingCartItem-content">
                                <div class="ShoppingCartItem-details">
                                    <a class="ShoppingCartItem-title" href="">{!!$row->name!!}</a>
                                    <div class="ShoppingCartItem-format">Quantity: <strong>{!!$row->qty!!}</strong></div>
                                    
                                    <div class="ShoppingCartItem-format">ISBN: <strong>{!!$row->options->isbn!!}</strong></div>
                                   
                                </div>
                                <div class="ShoppingCartItem-priceInfo">
                                   
                                   
                                </div>
                            </div>
                            
                            
                        </div>
                        @endforeach     
                            
                    </div>
                </div>
            </div>
    
            <div class="ShoppingCart-sidebar-container">
                
                <div class="ShoppingCart-sidebar Mobile-content"><div><div class="OrderSummary-Container"><div class="OrderSummary-Header">Request Summary</div><div class="OrderSummary-Item"><div><span >Number of Items:</span><span></span><span></span></div><div><span></span><span>{!!Cart::count()!!}</span></div></div><div class="OrderSummary-Item"></div></div><div><div class="ShoppingCart-proceedButtonContainer">

                @if(Cart::count() !=0)
                    @if(Auth::guard('students')->check())
                        @if((Auth::guard('students')->user()->status==1))
                            <form action="{!!url('/checkout')!!}" method="post" accept-charset="utf-8">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button class="search-btn btn btn-default" type="submit" class="btn btn-large btn-primary pull-right" style="font-weight:bold;width: 365px;">REQUEST NOW</button>      
                            </form>
                        @else
                            <h6 style="color:red;text-align: center;"><b>YOU CANNOT REQUEST</b></h6>
                        @endif                                       
                                          
                 
                    @else              
                  <a class="btn btn-large btn-warning pull-right" href="{!!url('/login')!!}" >REQUEST NOW</a>
                  
                @endif
              @endif

            </div></div></div>
                
               
            </div>
        </div>
        
        </div>
    
            <!-- Content end -->
    
        <div class="ShoppingCart-separator"></div>

    </div>


        </div>
     </div>


@include('layout.footer')