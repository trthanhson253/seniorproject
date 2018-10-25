@extends('admin.master')
@section('content')        
 <div class="page-title">
            <div class="title_left">
               <p style="font-weight: 10px;color:blue;">Home >> Category >> List </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;">
                            
                    <div class="x_title">
                        <h2 style="font-weight: bold;"><i class="fa fa-list" aria-hidden="true"></i> Category List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                            
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                                <li role="presentation" class="active"><a href="admin/cates/list" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                <li role="presentation" ><a href="admin/cates/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li>
                                
                                
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
                                    <th>Category Name</th>                
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cates as $cts)
                            <tr>
                                <td>{{$cts->id}}</td>
                                <td>{{$cts->name}}</td>
                                <td>
                                    <a class="btn btn-warning" href="admin/cates/edit/{{$cts->id}}">
                                            <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="admin/cates/delete/{{$cts->id}}" onclick="return confirm('Do you really want to delete this category ?');">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                                            
                                </td> 
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




