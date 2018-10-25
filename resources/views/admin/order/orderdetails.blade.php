@extends('admin.master')
@section('content')        
 <div class="page-title">
            <div class="title_left">
               <p style="font-weight: 10px;color:blue;">Home >> Request >> Detail </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;">
                            
                    <div class="x_title">
                        <h2 style="font-weight: bold;"><i class="fa fa-list" aria-hidden="true"></i> Request Details Number {{$orders->id}} </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                            
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                                <li role="presentation"><a href="admin/order/list" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                <li role="presentation" ><a href="admin/order/pendingorder" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Pending Request </a></li>
                                <li role="presentation" ><a href="admin/order/completedorder" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Completed Request </a></li>
                                
                                
                            </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                <form action="admin/order/detail/{{$orders->id}}" method="POST" role="form" enctype="multipart/form-data">  
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">  

                        <h3>Student Information ({{$orders->students->name}})</h3>                       
                        <hr>
                        <br> 
                        <table style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th> 
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Request Date</th>
                                    
                                                                                                  
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$orders->students->student_id}}</td>
                                    <td>{{$orders->students->name}}</td>
                                    <td>{{$orders->students->email}}</td>
                                    <td>{{$orders->students->phone}}</td>
                                    <td>{{$orders->students->address}}</td>
                                    <td>{{$orders->created_at}}</td>
                                </tr>

                            </tbody>

                        </table>                      
                           
                            
  <h3>Request Details</h3>                       
                        <hr>
                        <br>




                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                
                            <thead style="background-color: #1A82C3;color:white; ">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th> 
                                    <th>Title</th>
                                    <th>ISBN</th>
                                    <th>Quantity of books</th>
                                    <th>Available Copies</th>
                                   
                                    
                                    
                                
                                
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orderdetails as $od)
                            <tr>
                                <td>{{$od->id}}</td>
                                <td><img style="width:30px;" src="upload/image/{{$od->books->image}}" /></td> 
                                <td>{{$od->books->title}}</td>   
                                <td>{{$od->books->isbn}}</td>   
                                <td>{{$od->quantity}}</td>
                                <td>{{$od->books->available}}</td>
                               
                             
                            </tr>
                                                        
                            @endforeach                          
                            </tbody>
                            </table>
                        </div>
                        @if($orders->status==0)
                         <button type="submit" class="btn btn-danger"> Confirm This Request </button>
                         @else
                         <p style="font-weight: bold;color: blue;font-size: 20px;">REQUEST COMPLETED ON {{$orders->created_at}}</p>
                         @endif
            </form>
                        
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </div><!---end-->               
       
@endsection




