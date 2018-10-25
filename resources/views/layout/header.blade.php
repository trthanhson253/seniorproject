<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <base href="{{asset('')}}">
        <link rel="stylesheet" href="frontpage/css/font-awesome.min.css">
        <link rel="stylesheet" href="frontpage/css/bootstrap.css">
        <link rel="stylesheet" href="frontpage/css/style.css">
        <!-- Add the slick-theme.css for styling -->
        <link rel="stylesheet" type="text/css" href="frontpage/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="frontpage/css/slick-theme.css"/>
        <link rel="stylesheet" href="frontpage/css/main.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <title>Online Library Management System</title>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <style type="text/css">.subiz_online { cursor: pointer; display: block; height: 33px; width: 150px; line-height: 22px; text-indent: -99999px; background: url(https://dashboard.subiz.com/public/img/button/gallery/subiz-button3-online.png) no-repeat scroll left center white; }.subiz_offline { cursor: pointer; display: block; height: 33px; width: 150px; line-height: 22px; text-indent: -99999px; background: url(https://dashboard.subiz.com/public/img/button/gallery/subiz-button3-offline.png) no-repeat scroll left center white; } </style>
    </head>

    <body id="main-page">
      <!-- second NAVIGATION BAR -->
    <nav class="navbar pt-2 justify-content-center text-black" style="background:#febc11; font-weight:bold;line-height:7px;">
          Library: 7:30 A.M. - 12:00 A.M.  |  Johnson Library: 8:00 A.M. - 10:00 P.M
          
      </nav> <!--End the first navbar-->

     <nav class="navbar navbar-expand-md navbar-default" style="background: #232F3E; ">
       <div class="container py-3">
         <a  class="navbar-brand" href="">
           <img src="frontpage/img/logoksu1.png" alt="" style="width:350px;">
       
         </a>

         <form class="col-lg-6 ml-auto" role="search" method="post" action="search" id="searchform" action="/">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
           <div class="d-flex flex-row">
             <div class="input-group">
             
                   
                     <input type="text" class="form-control" placeholder="Search Books by Title, Author, Keyword, or ISBN" name="search" id="search">
                     <div class="input-group-btn">
                       <button class="search-btn btn btn-default" id="searchsubmit" type="submit" style="font-weight:bold;"><img src="frontpage/img/icon/search.png" alt="" style="width:20px;">  </button>
                     </div>         
             </div>
             
           </div>

         </form>
         <span class="cart pl-4">
               <a href="{!!url('orderdetail')!!}" style="font-weight: none;font-size: 14px;color:white;" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"><img src="frontpage/img/icon/shoplist.png" alt="" style="width:30px;">Request's List
                @if(Cart::count() !=0)
                  <sup>({{Cart::count()}})</sup> 
                @else
                  <sup></sup>
                @endif
                </a>
          </span>
       </div>
     </nav>  <!--END THIS NAVBAR -->

      <!-- first navbar -->
       
    <div class="Navigation" id="HeaderNavigation" style="line-height: 25px;">
      <div class="SuperMenu Content" role="menubar">
        
                <div class="SuperMenuItem MenuLink">

                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" ><img src="frontpage/img/icon/list.png" style="width:20px;"> All Categories</a>
             
                <div class="dropdown-menu" style="background: #F3EFEA;">
                   @foreach($cates as $ct)
                  @if(count($ct->subCates)>0)
                  <a class="dropdown-item" href="cates\{{$ct->id}}" style="font-size: 12px;font-weight: bold;color: brown;"><img src="frontpage/img/icon/arrow.png" style="width:20px;"> {{$ct->name}}</a>
                  @endif
              @endforeach
                </div>
                
              </div>
               
            
                <div class="SuperMenuItem MenuLink">
                    <a role="menuitem" class="SuperMenuItem-link" href=""><img src="frontpage/img/icon/homeicon.png" style="width:20px;"> Home</a>
                </div>
            
               <div class="SuperMenuItem MenuLink">
                    <a role="menuitem" class="SuperMenuItem-link" href=""><img src="frontpage/img/icon/student.png" style="width:20px;"> Students</a>
                </div>
            
                <div class="SuperMenuItem MenuLink">
                    <a role="menuitem" class="SuperMenuItem-link" href="emailus"><img src="frontpage/img/icon/contact.png" style="width:20px;"> Email us</a>
                </div>

                
            
                <div class="SuperMenuItem MenuLink">
                    <a role="menuitem" class="SuperMenuItem-link" href="http://www.kennesaw.edu/"><i class="fas fa-link" style="color: purple;"></i>

 Links</a>
                </div>
                @if(Auth::guard('students')->check())
                 <div class="SuperMenuItem MenuLink">
                    <a role="menuitem" class="SuperMenuItem-link" href="signup"></a>
                </div>
                @else
                <div class="SuperMenuItem MenuLink">
                    <a role="menuitem" class="SuperMenuItem-link" href="signup"><img src="frontpage/img/icon/add.png" style="width:20px;"> Sign Up</a>
                </div>
                @endif
                
                <div style="float:right;color:#35938B;">
                @if(Auth::guard('students')->check())  
                <div class="SuperMenuItem MenuLink">

                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user"></i> Hi, {{Auth::guard('students')->user()->name}}! </a>
                <?php                           
                $message = DB::table('message')->where('idStudent',Auth::guard('students')->user()->id)->where('status',0)->count('*');      
                ?>

                <div class="dropdown-menu" style="background: #F3EFEA;font-size: 14px;">                  
                  <a class="dropdown-item" href="students/myaccount"><img src="frontpage/img/icon/account.png" style="width:20px;"> My Account</a>
                  <a class="dropdown-item" href="students/mymessage/{{Auth::guard('students')->user()->id}}"><img src="frontpage/img/icon/notification.png" style="width:20px;"> My Message @if($message>0)<sup><strong>({!!$message!!})</strong><sup> @else @endif </a>
                  <a class="dropdown-item" href="students/myreturned/{{Auth::guard('students')->user()->id}}"><img src="frontpage/img/icon/history.png" style="width:20px;"> History Rent</a>                    
                  <a class="dropdown-item" href="logout"><img src="frontpage/img/icon/logout.png" style="width:20px;"> Log Out</a>           
                </div>
                
              </div>
                @else
                <div class="SuperMenuItem MenuLink" >
                    <a role="menuitem" class="SuperMenuItem-link" href="login"><img src="frontpage/img/login1.png" alt="" style="width:25px;"> Login</a>
                </div>
                @endif

                </div>

                
                
    </div>

</div>
    
   