@extends('admin.master')
@section('content')        
 <div class="page-title">
            <div class="title_left">
               <p style="font-weight: 10px;color:blue;">Home >> User >> List </p>
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
                        <h2 style="font-weight: bold;"><i class="fa fa-list" aria-hidden="true"></i> Librarian List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                            
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                                <li role="presentation" class="active"><a href="admin/user/list" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                @if(Auth::user()->level==1)
                                <li role="presentation" ><a href="admin/user/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li>
                                @else
                                <li></li>
                                @endif
                                
                                
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
                                    <th>Username</th> 
                                    <th>Email</th> 
                                    <th>Level</th>
                                    @if(Auth::user()->level==1)            
                                    <th>Edit</th>
                                        
                                    <th>Delete</th>
                                    @endif
                                </tr>
                               
                            </thead>

                            <tbody>
                                <?php $n=0 ?>
                                    @foreach($user as $u)
                                <?php $n=$n+1 ?>
                             <tr>
                                    <td>{!! $n !!}</td>
                                    @if($u->image=="")
                                   <td><img src="admin/image/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;"></td>
                                    @else
                                    
                                     <td><img src="upload/user/{{$u->image}}" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;"></td>
                                    @endif
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>
                                    @if($u->level==1)
                                    {{"Admin"}}
                                    @else
                                    {{"Librarian"}}
                                    @endif
                                @if(Auth::user()->level==1)
                                <td>
                                    <a class="btn btn-warning" href="admin/user/edit/{{$u->id}}">
                                            <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                 
                                <td>
                                    <a class="btn btn-danger" href="admin/user/delete/{{$u->id}}" onclick="return confirm('Do you really want to delete this Librarian ?');">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                 @endif                            
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




