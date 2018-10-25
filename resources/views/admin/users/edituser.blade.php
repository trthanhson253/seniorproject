@extends('admin.master')
@section('content')

 <div class="page-title">
            <div class="title_left">
                
                 <p style="font-weight: 10px;color:blue;">Home >> User >> Edit </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;" >
                    <div class="x_title" >
                        <h2 style="font-weight: bold;"><i class="fa fa-edit"></i> Edit Librarian </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="nav nav-pills">
                               <ul class="nav nav-pills">
                                <li role="presentation" ><a href="admin/user/list" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                
                                <li role="presentation" class="active" ><a href="admin/user/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li>
                                
                                
                            </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                             @if(session('warning'))
                                <ul class="alert alert-success">
                                <li>{{session('warning')}}</li>    
                                </ul>                 
                            @endif
                            <form action="admin/user/edit/{{$user->id}}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Username:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="name" placeholder="Add Username" value="{{$user->name}}" required="required" class="form-control col-md-7 col-xs-12">
                                         @if ($errors->has('name'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Email:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="email" name="email" placeholder="Add Email" value="{{$user->email}}"  required="required" class="form-control col-md-7 col-xs-12">
                                         @if ($errors->has('email'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">                                   
                
                                    
                                </div>
                                <div class="form-group">

                                    <label class="control-label col-md-4">Password:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="password" name="password" id="password" placeholder="Add Password"  required="required" class="form-control col-md-7 col-xs-12">
                                         @if ($errors->has('password'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Confirm Password:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="password" name="retypepassword" id="retypepassword"  placeholder="Confirm Password" required="required" class="form-control col-md-7 col-xs-12">
                                         @if ($errors->has('retypepassword'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('retypepassword') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Picture:(Optional)
                                    </label>
                                    <div class="col-md-4">
                                        @if($user->image)
                                        <img src="upload/user/{{$user->image}}" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                                                               
                                    
                                        @else
                                        <img src="admin/image/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                         @endif                                  
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" value="{{$user->image}}" class="form-control col-md-7 col-xs-12">
                                       
                                    </div>
                                </div>
                               <div class="form-group">
                                    <label class="control-label col-md-4">Level:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <label class="radio-inline">
                                    <input name="level" value="2" 
                                            @if($user->level==2)
                                                {{"checked"}}
                                            @endif
                                            type="radio">Librarian
                                    </label>
                                        <label class="radio-inline">
                                            <input name="level" value="1" 
                                            @if($user->level==1)
                                                {{"checked"}}
                                            @endif
                                            type="radio">Admin
                                    </label>
                                        

                                         @if ($errors->has('level'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('level') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>
                                </div>
                    
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                         <a href="admin/user/list"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit </button>
                                        
                                        
                                    </div>
                                </div>
                            </form>
                            
                                                    
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>


</div><!---end-->
                            <!-- /page content -->

                        <!-- footer content -->
@endsection


