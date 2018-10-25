@extends('admin.master')
@section('content')        
 <div class="page-title">
            <div class="title_left">
               <p style="font-weight: 10px;color:blue;">Home >> Request >> List </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;">
                            
                    <div class="x_title">
                        <h2 style="font-weight: bold;"><i class="fa fa-list" aria-hidden="true"></i> Request List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                            
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                                <li role="presentation" class="active"><a href="admin/order/list" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                <li role="presentation" ><a href="admin/order/pendingorder" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Pending Request </a></li>
                                <li role="presentation" ><a href="admin/order/completedorder" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Completed Request </a></li>
                                
                                
                            </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                
                            <thead style="background-color: #1A82C3;color:white; ">
                                <tr>
                                    <th>ID</th>
                                    <th>Borrower Name</th> 
                                    <th>Number of Borrowed Books</th>
                                    <th>Date Borrowed</th>
                                    
                                    <th>Detail</th>
                                    <th>Cancel</th>
                                    <th>Status</th>
                                    

                                
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $o)
                            <tr>
                                <td>{{$o->id}}</td>
                                <td>{{$o->students->name}}</td> 
                                
                                
                                <td>{{$o->quantity}}</td>
                                <td>{{$o->created_at}}</td>
                                
                                 <td class="center"><a href="admin/order/detail/{{$o->id}}"><button type="submit" name="submit" class="btn btn-success"><i class="fa fa-search-plus" aria-hidden="true"></i></button></a></td>
                                  <td class="center"><a href="admin/order/delete/{{$o->id}}" onclick="return confirm('Do you really want to cancel this request ?');"><button type="submit" name="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>    
                                
                                 @if($o->status==0)                            
                                    <td class='alert alert-danger' style="color: white;font-weight: bold;">PROCESSING</td>
                                @else
                                    <td class='alert alert-success'style="color: blue;font-weight: bold;">COMPLETED</td>
                                @endif   


                               
                            </tr>
                                                        
                            @endforeach                          
                            </tbody>
                            </table>
                        </div>
                        
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </div><!---end-->               
       
@endsection




