@extends('admin.master')
@section('content')        
 <div class="page-title">
            <div class="title_left">
               <p style="font-weight: 10px;color:blue;">Home >> Issue >> List </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;">
                            
                    <div class="x_title">
                        <h2 style="font-weight: bold;"><i class="fa fa-list" aria-hidden="true"></i> Issue Book List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                            
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                                <li role="presentation" class="active"><a href="admin/issue/list" ><i class="fa fa-table" aria-hidden="true"></i> Borrowed Books List</a></li>
                                <li role="presentation" ><a href="admin/issue/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Issue Books </a></li>
                                <li role="presentation" ><a href="admin/issue/returnlist" ><i class="fa fa-sign-out"></i> Returned Books List</a></li>
                                
                                
                            </ul>
                        <div class="clearfix"></div>
                    </div>
                     @if(session('warning'))
                                <ul class="alert alert-success">
                                <li>{{session('warning')}}</li>    
                                </ul>                 
                            @endif
                    <div class="x_content">
                        <!-- content starts here -->

                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                
                            <thead style="background-color: #1A82C3;color:white; ">
                                <tr>
                                    <th>ID</th>
                                    <th>Borrower ID</th>                
                                    <th>Borrower Name</th>
                                    <th>Title</th>
                                    <th>ISBN</th>
                                    <th>Borrowed Date</th>
                                    <th>Due Date</th>
                                    <th>Number of Due Days</th>
                                    <th>Status</th>
                                    <th>Return</th>
                                    <th>Extend Date</th>
                                    <th>Message</th>
                                    
                                     
                            </thead>
                            <tbody>
                            @foreach($issue as $i)
                        <tr>
                            <td>{{$i->id}}</td>                       
                            <td>{{$i->students->student_id}}</td>
                            <td><a href="admin/student/editstudents/{{$i->students->id}}">{{$i->students->name}}</a></td>
                            
                            
                            <td>{{$i->books->title}}</td>
                           
                            <td>{{$i->books->isbn}}</td>
                            

                            <td>{{$i->created_at}}</td>
                            <td>{{$i->returndate}}</td>
                            <td> <?php
                                        $date1 = new DateTime($now);
                                        $date2 = new DateTime($i->returndate);
                                        if($date1>$date2){
                                            $diff = date_diff($date1,$date2);                    
                                            echo $diff->format("%a");
                                        }else{
                                            echo "0";
                                        }                                    
                                        ?></td>
                            
                           
                            @if($i->returndate<$now)
                             
                            <td class='alert alert-danger' style="color: white;font-weight: bold;">EXPIRED</td>
                            @else
                            <td class='alert alert-success'style="color: blue;font-weight: bold;">VALID</td>
                            @endif
                            <td><a href="admin/issue/return/{{$i->id}}"><button type="submit" name="submit" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span></button></a></td>
                            <td><a href="admin/issue/extend/{{$i->id}}"><button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span></button></a></td>
                           <td><a href="admin/issue/sendmessage/{{$i->id}}"><button type="submit" name="submit" class="btn btn-danger"><span class="glyphicon glyphicon-envelope"></span></button></a></td>
                            
                                                                          
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




