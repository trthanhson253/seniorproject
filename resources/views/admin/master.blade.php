<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KSU Library Management System</title>

    <!-- Add sau -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />


    
    <!-- Bootstrap core CSS -->

    
    <base href="{{asset('')}}">
   <link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="admin/css/font-awesome.min.css"  rel="stylesheet">
    <link href="admin/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="admin/css/custom.css" rel="stylesheet">
    <link href="admin/css/green.css" rel="stylesheet">
    <!-- ion_range -->
    <link rel="stylesheet" href="admin/css/normalize.css"  />
    <link rel="stylesheet" href="admin/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="admin/css/ion.rangeSlider.skinFlat.css"  />

    <!-- colorpicker -->
    <link href="css/bootstrap-colorpicker.min.css"  rel="stylesheet">
    
    <script src="css/jquery.min.js"></script>   
    <!-- ion_range -->
    <link rel="stylesheet" href="admin/css/normalize.css"  />
    <link rel="stylesheet" href="admin/css/ion.rangeSlider.css"  />
    <link rel="stylesheet" href="admin/css/ion.rangeSlider.skinFlat.css"  />
    <link id="bootstrap-style" href="admin/css/slide.css"  rel="stylesheet">
    <!-- Bootstrap --> 
        <link rel="stylesheet" type="text/css" href="admin/css/DT_bootstrap.css" >
        <script src="admin/css/jquery.js"  type="text/javascript"></script>
        <script src="admin/css/bootstrap.js" type="text/javascript"></script>
        
        <script type="text/javascript" charset="utf-8" language="javascript" src="admin/css/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8" language="javascript" src="admin/css/DT_bootstrap.js"></script>
        <script src="admin/css/nprogress.js"></script>
        
    <script>
        NProgress.start();
    </script>
    
    

</head>


<body class="nav-md">

    <div class="container body">
        <div class="main_container">

                        <!-- sidebar navigation -->
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0; margin-top: 20px;">
                        <a id="menu_toggle"><img src="../public/admin/image/logo.jpg" class="img-fluid" alt="image" style="width: 210px;"></a>
                    </div>
                    <div class="clearfix"></div>
                     <span style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i><?php
                                            date_default_timezone_set("America/New_York");
                                            echo "   ".date("m-d-Y");
                                            ?><span>
                    <!-- menu prile quick info -->
                    
                    <div class="profile">
                        @if(Auth::user()->image)
                        
                        <div class="profile_pic">
                            <img src="../public/upload/user/{{Auth::user()->image}}" style="height:65px; width:75px;" class="img-circle profile_img">
                                        
                        </div>
                        @else
                        <div class="profile_pic">
                            <img src="../public/admin/image/user.png" style="height:65px; width:75px;" class="img-circle profile_img">
                                        
                        </div>
                        @endif

                        @if(Auth::check())
                        <div class="profile_info">
                            <span>Welcome, <strong>{{Auth::user()->name}}</strong></span>
                            <h2></h2>
                        </div>
                        @endif
                    </div>
                    
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3 style="margin-top:85px;"></h3>
                            <div class="separator"></div>
                            <ul class="nav side-menu" ">
                                <li>
                                    <a href="admin/dashboard" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
                                </li>
                                <li>
                                    <a href="admin/cates/list" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"><i class="fa fa-list" aria-hidden="true"></i>Category</a>
                                </li>
                                <li>
                                    <a href="admin/subcates/list/all" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"><i class="fa fa-folder-open" aria-hidden="true"></i>SubCategory</a>
                                </li>
                                                        <li>
                                    <a href="admin/books/list/all" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"><i class="fa fa-book" aria-hidden="true"></i>Books</a>
                                </li>
                                                            <li>
                                    <a href="admin/user/list" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"><i class="fa fa-users"></i>Librarians</a>
                                </li>
                            
                                <li>
                                    <a href="admin/issue/list" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"><i class="fa fa-edit"></i>Issue/Return</a>
                                </li>
                                <li>
                                    <a href="admin/students/list" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';" ><i class="fa fa-graduation-cap" aria-hidden="true"></i>Students</a>
                                </li>
                                <li>
                                    <a href="admin/message/list" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';" ><i class="fa fa-envelope" aria-hidden="true"></i>Message</a>
                                </li>
                                <li>
                                    <a href="admin/order/list" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"><i class="fa fa-book" aria-hidden="true"></i>Requests</a>
                                </li>
                                
                               
                                <li>
                                    <a href="admin/aboutus" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"><i class= "fa fa-info"></i>About Us</a>
                                </li>
                              
                            </ul>
                        </div>

                    </div>
                    
                </div>
            </div>
            <!-- end of sidebar navigation -->                          <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu" style="background: #2A3F54;">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <h3 style="color:white;"></h3>
                        </div>
                        
                        @if(Auth::check())

                        <ul class="nav navbar-nav navbar-right">

                            <li class="">

                                <a href="admin/logout">

                                    <div style="color: white;">
                                       
                                                    <span > Log out </span>
                                                                <i class="fa fa-sign-out fa-fw"></i>
                                                                    </div>
                                </a>
                                
                            </li>

                        </ul>
                        @endif
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->                
                    <!-- page content -->
                    <div class="right_col" role="main">
                        <div class="">
        
 
        @yield('content')


                           
                       
                        <!-- /footer content -->

                    </div><!---end right col-->
                </div><!---end main container-->
            </div><!---end container body-->
             <footer style="background: #2A3F54; color: white;">
                            <div class="" >
                                <p class="pull-right">Online Library Management System 2018
                                    <span> <i class="fa fa-university"></i> Kennesaw State University    </span>
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </footer>
</div>

<script type="text/javascript" language="javascript" src="admin/ckeditor/ckeditor.js" ></script>


@yield('script')



</body>

</html>
