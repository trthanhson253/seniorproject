@include('layout.header')
<br>
     <div class="Content LandingPage-content">
            @include('layout.menu')






<div class="LandingPage-modulesContainer">


 <div class="col-lg-9">
   <div class="container-fluid">
     <div class="row">
       <!-- book image -->
       <div class="col-md-4">
         <img src="upload/image/{{$books->image}}" alt="book 5" class="img-thumbnail" style="width: 250px; height: 350px;">
       </div>
       <!-- author, isbn -->
       <div class="col-md-8 py-4">
         <ul>
           <li><h4 style="color: orange;"><b>{{$books->title}}

           </b></h4></li>
           <br>
           <li><b>Author:</b> {{$books->author}}</li>
           <li><b>Pulisher:</b> {{$books->publisher}}</li>
           <li><b>ISBN:</b>{{$books->isbn}}</li>
           <li><b>{{$books->available}} copies available in library</b></li>
           <li><b>Shelf: </b>{{$books->shelf}}</li>

           </li>
           <br>
           @if(Auth::guard('students')->check())

              @if($books->available>0 && Auth::guard('students')->user()->status==1)
                 <button class="search-btn btn btn-default" type="submit" id="rent" value="addtocart" onclick="disable()" style="font-weight:bold;width: 400px;"><a href="addtocart/{{$books->id}}" style="color:black;" >REQUEST THIS BOOK</a></button>
              @elseif($books->available==0 && Auth::guard('students')->user()->status==1)
                  <img src="frontpage/img/outofstock.png" style="width:150px;">
              @elseif($books->available>=0 && Auth::guard('students')->user()->status==0)
            <h6 style="color:red;"><b>Sorry, {{Auth::guard('students')->user()->name}}.You cannot request books at this time.Please contact librarian for more information</b></h6>
              @endif
           @else
             @if($books->available>0)
             <h5><b>You must <a href="login">login</a> before requesting books</b></h5>
             @else
             <img src="frontpage/img/outofstock.png" style="width:150px;">
             @endif
           @endif




         </ul>
       </div> <!--end author, isbn -->
     </div>
   </div>
   <!-- Description, comment -->
   <hr>
   <div class="container py-4">
       <h2><b>Review</b></h2>
       @if($books->description)
       <p>{!! $books->description !!}</p>
       @else
       <h4>No Review</h4>
       @endif
       <br>
       <hr>
  <div class="container">
     <div class="row">
       <!-- book list -->
       <h3 class="text-secondary">Related Books</h3>
       
       <div class="slider" >
           @foreach($relates as $r)
           <li class="slide1">
            <a href="books/{{$r->id}}">
               <img src="upload/image/{{$r->image}}" alt="" class="img-responsive" />
               <div ><a class="text-secondary text-justify-left font-weight-bold" href="books/{{$r->id}}">{{$r->title}}</a></div>
             </a>  

           </li>
           @endforeach
         </div> <!-- end book list -->
         
     </div>
   </div>
   <hr>
        @if(session('error'))
                <ul class="alert alert-success" style="text-align: center;color: blue;font-weight: bold;">
                <li>{{session('error')}}</li>    
                </ul>                 
            @endif
       <b style="color: blue;font-size: 22px;"><img src="frontpage/img/comment.png" style="width:50px;"> Student Comments</b>
       @if(Auth::guard('students')->check())
       <div class="well">
                    <h4>Write your comment ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form action="comment/{{$books->id}}" method="post">
                      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                             <input type="text" name="headline" required="required" placeholder="Add Headline" class="form-control col-md-7 col-xs-12">
                              
                             <br>
                            <textarea class="form-control" name="content" required="required" rows="3"></textarea>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Send Comments ..</button>
                    </form>
        </div>
        <hr>
        @else
          <h5>Please <a href="login">login</a> to write comments..</h5>
        @endif
        
                <br><br>
      @foreach($comment as $cm)
          <div class="media">
                    <a class="pull-left" href="#">
                                  
                                    @if($cm->student->image=="")
                                    <img class="media-object" src="admin/image/user.png" width="80px" height="80px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                    @else                                 
                                    <img class="media-object" src="upload/student/{{$cm->student->image}}" width="80px" height="80px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                    @endif

                       
                    </a>
                    
                    <div class="media-body" style="padding-left: 30px;">
                        <h5 class="media-heading"><strong style="color: blue;"><img src="frontpage/img/title.png" style="width:30px;"> {{$cm->headline}}</strong>  
                            <span style="font-size: 12px;">Posted at: <strong style="color:brown;">{{$cm->created_at}}</strong></span>
                        </h5>
                        <p>by <strong style="color:green;">{{$cm->student->name}}</strong></p>
                        <span style="font-size: 13px;">{{$cm->content}}</span>
                    </div>
                   
                </div>
                <br>
                <hr><br>
         @endforeach
   </div> <!-- End Description, comment -->


                        <div class="LandingPage-module ">
                            <!-- module 21938 failed to render -->
                        </div>

                </div>
            </div>

            <div style="clear:both;"></div>
        </div>
    </div>




   @include('layout.footer')