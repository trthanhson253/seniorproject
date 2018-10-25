@extends('admin.master')
@section('content')        
 <div class="page-title">
            <div class="title_left">
               <p style="font-weight: 10px;color:blue;">Home >> Student >> List </p>
            </div>
        </div>
        <div class="clearfix"></div>
         @if(session('warning'))
                    <div class="alert alert-success">
                        {{session('warning')}}
                    </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;">
                            
                    <div class="x_title">
                        <h2 style="font-weight: bold;"><i class="fa fa-list" aria-hidden="true"></i> Student List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                            
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                                <li role="presentation" class="active"><a href="admin/students/list" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                
                                <li role="presentation" ><a href="admin/students/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li>
                               
                               
                                
                                
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
                                    <th>Picture</th>  
                                    <th>Full Name</th>  
                                    <th>Student ID</th>                                      
                                    <th>Email</th> 
                                    <th>Phone</th>
                                    <th>Address</th>  
                                    <th>Status</th>  
                                    <th>Details</th>                                            
                                                                         
                                    <th>Edit</th>
                                        
                                    <th>Delete</th>
                                   
                                </tr>
                               
                            </thead>

                            <tbody>
                                <?php $n=0 ?>
                                     @foreach($student as $st)
                                <?php $n=$n+1 ?>
                             <tr>
                                    <td>{!! $n !!}</td>
                                    @if($st->image=="")
                                   <td><img src="admin/image/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;"></td>
                                    @else
                                    
                                     <td><img src="upload/student/{{$st->image}}" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;"></td>
                                    @endif
                                    <td>{{$st->name}}</td>                             
                                        <td>{{$st->student_id}}</td>
                                        <td>{{$st->email}}</td>
                                        <td>{{$st->phone}}</td>
                                        <td>{{$st->address}}</td>
                                        @if($st->status==0)
                                        <td style="color: red;"><strong>BLOCKED</strong></td>
                                        @else
                                        <td style="color: purple;"><strong>ACTIVE</strong></td>
                                        @endif
                                        <td><a href="admin/students/detail/{{$st->id}}"><button type="submit" name="submit" class="btn btn-success"><i class="fa fa-search-plus" aria-hidden="true"></i></button></a></td>
                            
                                <td>
                                    <a class="btn btn-warning" href="admin/students/edit/{{$st->id}}">
                                            <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                 
                                <td>
                                    <a class="btn btn-danger" href="admin/students/delete/{{$st->id}}" onclick="return confirm('Do you really want to delete this student ?');">
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




