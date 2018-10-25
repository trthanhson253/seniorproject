@extends('admin.master')
@section('content')

 <div class="page-title">
            <div class="title_left">
                
                 <p style="font-weight: 10px;color:blue;">Home >> Student >> Add </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;" >
                    <div class="x_title" >
                        <h2 style="font-weight: bold;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Student </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="nav nav-pills">
                               <ul class="nav nav-pills">
                                 <li role="presentation" ><a href="admin/students/list" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                
                                <li role="presentation" class="active"><a href="admin/students/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li>
                                
                                
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
                             @if(session('error'))
                                <ul class="alert alert-danger">
                                <li>{{session('error')}}</li>    
                                </ul>                 
                            @endif
                            <form action="admin/students/add" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Username:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="name" placeholder="Add Username" required="required" class="form-control col-md-7 col-xs-12">
                                         @if ($errors->has('name'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Student ID:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="number" name="studentid" placeholder="Add Student ID" required="required" class="form-control col-md-7 col-xs-12">
                                         @if ($errors->has('studentid'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('studentid') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Email:
                                    </label>
                                    <div class="col-md-3">
                                        <input type="email" name="email" placeholder="Add Email" required="required" class="form-control col-md-7 col-xs-12">
                                         @if ($errors->has('email'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Phone:
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="phone" placeholder="Add Phone" required="required" class="form-control col-md-7 col-xs-12">
                                        
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Address:
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="address" placeholder="Add Address" required="required" class="form-control col-md-7 col-xs-12">
                                        
                                        <br>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4">Password:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="password" name="password" placeholder="Add Password" required="required" class="form-control col-md-7 col-xs-12">
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
                                        <input type="password" name="retypepassword" placeholder="Confirm Password" required="required" class="form-control col-md-7 col-xs-12">
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
                                        <img src="admin/image/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                                                               
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Status:
                                    </label>
                                    <div class="col-md-8">
                                        <label class="radio-inline">
                                                <input name="status" value="0" checked="" type="radio">INACTIVE
                                        </label>
                                        <label class="radio-inline">
                                                <input name="status" value="1" type="radio">ACTIVE
                                        </label>
                                        
                                    </div>
                                </div>
                    
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                         <a href="admin/students/list"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Add </button>
                                        
                                        
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


