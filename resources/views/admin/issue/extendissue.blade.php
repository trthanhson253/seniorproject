@extends('admin.master')
@section('content')

 <div class="page-title">
            <div class="title_left">
                
                 <p style="font-weight: 10px;color:blue;">Home >> Issue >> Extend </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;" >
                    <div class="x_title" >
                        <h2 style="font-weight: bold;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Extend Issue for {{$issue->students->name}} </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="nav nav-pills">
                              <ul class="nav nav-pills">
                                <li role="presentation" ><a href="admin/issue/list" ><i class="fa fa-table" aria-hidden="true"></i> Borrowed Books</a></li>
                                <li role="presentation"><a href="admin/issue/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li>
                                <li role="presentation" ><a href="admin/issue/returnlist" ><i class="fa fa-sign-out"></i> Returned Books</a></li>
                                
                                
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
                            <form action="admin/issue/extend/{{$issue->id}}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <p>Student ID: {{$issue->students->student_id}}</p>
                                    <p>Student Name: {{$issue->students->name}}</p>
                                    <p>Phone Number: {{$issue->students->phone}}</p>
                                    <p>Address: {{$issue->students->address}}</p>
                                    <p>Email: {{$issue->students->email}}</p>
                                    <p>Initial Return Date: {{$issue->returndate}}</p>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="control-label col-md-4">Date Return Extend:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        
                                        <input type="date" data-form-field="book-issue-id" name="returndate" class="span8" style="width: 200px">
                                        <br>
                                        @if ($errors->has('returndate'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('returndate') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>

                                </div>
                               
                    
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Extend </button>
                                        
                                        
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

