@extends('admin.master')
@section('content')        
 <div class="page-title">
            <div class="title_left">
               <p style="font-weight: 10px;color:blue;">Home >> Student >> Detail </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;">
                            
                    <div class="x_title">
                        <h2 style="font-weight: bold;"><i class="fa fa-list" aria-hidden="true"></i> Student Page </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                            
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                                <li role="presentation"><a href="admin/students/list" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                
                                <li role="presentation" ><a href="admin/students/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li>
                                
                                
                            </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
            

                        <h4 style="font-weight: bold;color:blue;">STUDENT INFORMATION ({{$student->name}})</h4>                       
                        <hr>
                        
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
                            <thead style="background-color: #1A82C3;color:white; ">
                                <tr>
                                    <th>Picture</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th> 
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    
                                    
                                                                                                  
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                     @if($student->image=="")
                                   <td><img src="admin/image/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;"></td>
                                    @else
                                    
                                     <td><img src="upload/student/{{$student->image}}" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;"></td>
                                    @endif
                                    <td>{{$student->student_id}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->phone}}</td>
                                    <td>{{$student->address}}</td>
                                    
                                </tr>

                            </tbody>

                        </table>                      
                           
        <br>
         
         <h4 style="font-weight: bold;color:blue;">BORROWING BOOKS HISTORY</h4>                                         
                        <hr>                        
                        <div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
                                
                            <thead style="background-color: #1A82C3;color:white; ">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th> 
                                    <th>Title</th>
                                    <th>ISBN</th>
                                    <th>Borrowed Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>                                                          
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($issue as $i)
                            <tr>
                                <td>{{$i->id}}</td>
                                <td><img style="width:30px;" src="upload/image/{{$i->books->image}}" /></td> 
                                <td>{{$i->books->title}}</td>   
                                <td>{{$i->books->isbn}}</td>   
                                <td>{{$i->created_at}}</td>
                                <td>{{$i->returndate}}</td>

                                 @if($i->returndate<$now)
                             
                                <td class='alert alert-danger' style="color: white;font-weight: bold;">EXPIRED</td>
                                @else
                                <td class='alert alert-success'style="color: blue;font-weight: bold;">VALID</td>
                                @endif
                              
                            </tr>
                                                        
                            @endforeach                          
                            </tbody>
                            </table>
                        </div>
    <br>
     <h4 style="font-weight: bold;color:blue;">RETURNED BOOKS HISTORY</h4>                                         
                        <hr>                        
                        <div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
                                
                            <thead style="background-color: #1A82C3;color:white; ">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th> 
                                    <th>Title</th>
                                    <th>ISBN</th>
                                    <th>Borrowed Date</th>
                                    <th>Due Date</th>
                                    <th>Returned Date</th>
                                    <th>Paid?</th>
                                    <th>Fines</th>
                                                                                              
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($returns as $r)
                            <tr>
                                <td>{{$r->id}}</td>
                                <td><img style="width:30px;" src="upload/image/{{$r->books->image}}" /></td> 
                                <td>{{$r->books->title}}</td>   
                                <td>{{$r->books->isbn}}</td>   
                                <td>{{$r->borroweddate}}</td>
                                <td>{{$r->duedate}}</td>
                                <td>{{$r->created_at}}</td>
                                @if($r->paid==1)
                                      <td style="color: blue;font-weight: bold;">PAID</td>
                                @else
                                    <td style="color: red; font-weight: bold;">UNPAID</td>
                                @endif
                               <?php
                                        $date1 = new DateTime($r->created_at);
                                        $date2 = new DateTime($r->duedate);
                                        if($date1>$date2){
                                            $diff = date_diff($date1,$date2);
                                            if($diff->format("%a")*0.5<=35 && $diff->format("%a")<40){
                                                echo 
                                                "<td class='alert alert-danger' style='color: white;font-weight: bold;'>"."$".$diff->format("%a")*0.5."</td>";
                                            }else{
                                                echo 
                                                "<td class='alert alert-danger' style='color: white;font-weight: bold;'>"."$35.00"."</td>";
                                            }              
                                            
                                        }else{
                                            echo  "<td class='alert alert-success'style='color: blue;font-weight: bold;'>"."NO PENALTY"."</td>";
                                        }                                    
                                        ?></td>               
                              
                            </tr>
                                                        
                            @endforeach                          
                            </tbody>
                            </table>
                            <br>
                            <hr>
                             <form action="admin/students/detail/{{$student->id}}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <h3>This account is CURRENTLY @if($student->status==0) <span>BLOCKED</span> @else <span>ACTIVE </span>  @endif</h3>
                            <p>         
                                        @if($student->status==0)                      
                                        <input name="status" value="1" type="radio"> UNBLOCK NOW   
                                        @else   
                                        <input name="status" value="0" type="radio"> BLOCK NOW                                                                                    
                                        @endif
                                    </p>
                                    <br><br><hr>
                            <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> UPDATE... </button>
                                        
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
    <br>
    
    
                       
                       
          
                        
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </div><!---end-->               
       
@endsection




