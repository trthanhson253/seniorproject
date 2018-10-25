<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/style.css">
    <title>Login</title>
</head>
<body id="login">

    <nav class="navbar navbar-expand-md navbar-default" style="background: black; border-bottom: 3px solid #febc11;height: 80px;">
       <div class="container py-1">
         <a class="navbar-brand">
           <img src="admin/image/logo.jpg" alt="" style="width:250px;">
         </a>
       </div>
     </nav>  <!--END THIS NAVBAR -->

    <div class="container">
        <div id="main">
            @if(session('warning'))
                <ul class="alert alert-danger" style="text-align: center;color: red;font-weight: bold;">
                <li>{{session('warning')}}</li>    
                </ul>                 
            @endif
                <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                         <form class="form-signin" action="admin/login" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <fieldset>
                                <div class="form-group">
                                    <input type="name" required="required" name="name" value="{{ old('name') }}" class="form-control" placeholder="Username"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" required="required" name="password" class="form-control" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

            </div>
        </div>
   


    <script src="jquery/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>