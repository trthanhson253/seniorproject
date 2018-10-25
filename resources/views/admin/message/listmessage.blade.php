@extends('admin.master')
@section('content')        
 <div class="page-title">
            <div class="title_left">
               <p style="font-weight: 10px;color:blue;">Home >> Message >> List </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;">
                     @if(session('warning'))
                                <ul class="alert alert-danger">
                                <li>{{session('warning')}}</li>    
                                </ul>                 
                            @endif        
                    <div class="x_title">
                        <h2 style="font-weight: bold;"><i class="fa fa-list" aria-hidden="true"></i> Message List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                            
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                                <li role="presentation" class="active"><a href="admin/message/list" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                <li role="presentation" ><a href="admin/message/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Send Message</a></li>
                                
                                
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
                                    <th>Student Name</th>
                                    <th>Student ID</th>
                                    <th>Content Message</th>
                                    <th>Added by</th>
                                    <th>Sent at</th>                
                                    
                                    <th>Delete</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($message as $m)
                            <tr>
                                <td>{{$m->id}}</td>
                                <td>{{$m->student->name}}</td>
                                <td>{{$m->student->student_id}}</td>   
                                                             
                                <td>{{$m->content}}</td>   
                                <td>{{$m->user->name}}</td>   
                                 <td>{{$m->created_at}}</td> 
                                
                                <td>
                                    <a class="btn btn-danger" href="admin/message/delete/{{$m->id}}" onclick="return confirm('Do you really want to delete this message ?');">
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




