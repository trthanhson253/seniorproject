@extends('admin.master')
@section('content')        
 <div class="page-title">
            <div class="title_left">
               <p style="font-weight: 10px;color:blue;">Home >> Issue >> Return </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;">
                            
                    <div class="x_title">
                        <h2 style="font-weight: bold;"><i class="fa fa-list" aria-hidden="true"></i> Return Book </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                            
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                              <ul class="nav nav-pills">
                                <li role="presentation" ><a href="admin/issue/list" ><i class="fa fa-table" aria-hidden="true"></i> Borrowed Books List</a></li>
                                <li role="presentation"><a href="admin/issue/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Issue Books </a></li>
                                <li role="presentation" ><a href="admin/issue/returnlist" ><i class="fa fa-sign-out"></i> Returned Books List</a></li>
                                
                                
                            </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
            
                        <form action="admin/issue/return/{{$issue->id}}" method="POST" role="form" enctype="multipart/form-data">  
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                        <h4 style="font-weight: bold;color:blue;">Borrower's Information ({{$issue->students->name}})</h4>                       
                        <hr>
                        
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
                            <thead style="background-color: #1A82C3;color:white; ">
                                <tr>
                                    
                                    <th>Student ID</th>
                                    <th>Student Name</th> 
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    
                                    
                                    
                                                                                                  
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   
                                     <td>{{$issue->students->student_id}}</td>
                                    <td>{{$issue->students->name}}</td>
                                    <td>{{$issue->students->email}}</td>
                                    <td>{{$issue->students->phone}}</td>
                                    <td>{{$issue->students->address}}</td>
                                </tr>

                            </tbody>

                        </table>                      
                           
        <br>
         
         <h4 style="font-weight: bold;color:blue;">Book's Information</h4>                                         
                        <hr>                        
                        <div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
                                
                            <thead style="background-color: #1A82C3;color:white; ">
                                <tr>
                                    <th>ISBN</th>
                                    <th>Title</th> 
                                    <th>Author</th>
                                    <th>Issue Date</th>
                                    <th>Due Date</th>
                                    <th>Number of Due Days</th>
                                    <th>Status</th>                                              
                                </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                    <td>{{$issue->books->isbn}}</td>
                                    <td>{{$issue->books->title}}</td>
                                    <td>{{$issue->books->author}}</td>
                                    <td>{{$issue->books->created_at}}</td>
                                    <td>{{$issue->returndate}}</td>
                                    <td> <?php
                                        $date1 = new DateTime($now);
                                        $date2 = new DateTime($issue->returndate);
                                        if($date1>$date2){
                                            $diff = date_diff($date1,$date2);                    
                                            echo $diff->format("%a");
                                        }else{
                                            echo "0";
                                        }                                    
                                        ?></td>
                                     @if($issue->returndate<$now)
                             
                                    <td class='alert alert-danger' style="color: white;font-weight: bold;">EXPIRED</td>
                                    @else
                                    <td class='alert alert-success'style="color: blue;font-weight: bold;">VALID</td>
                                    @endif
                            </tr>
                                                        
                                                 
                            </tbody>
                            </table>
                        </div>
    <br>
    <br>
    
                <div class="form-group">
        
                                    <label class="control-label col-md-1">Condition:
                                    </label>
                                    <div class="col-md-8">
                                        <label class="radio-inline">
                                                <input name="status" value="1" checked="" type="radio">Normal
                                        </label>
                                        <label class="radio-inline">
                                                <input name="status" value="2" type="radio">Damaged
                                        </label>
                                        <label class="radio-inline">
                                                <input name="status" value="3" type="radio">Lost
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <br>
                                 <div class="form-group">
                                    <label class="control-label col-md-1">Penalties:
                                    </label>
                                   <div class="col-md-8">
                                        <label class="radio-inline">
                                                <input name="paid" value="1" checked="" type="radio">No
                                        </label>
                                        <label class="radio-inline">
                                                <input name="paid" value="0" type="radio">Yes
                                        </label>
                                        
                                    </div>
                                </div>
                                <br><br>
                           <div class="form-group">
                                    <label class="control-label col-md-1">Notes:
                                    </label>
                                    <div class="col-md-8">
                                        <textarea name="notes" rows="3"></textarea>
                                    </div>
                                </div>
                           
                                
                            
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                               
    <button type="submit" class="btn btn-danger"> Return Book </button>

                        
                       
            </form>
     
                       
                       
          
                        
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </div><!---end-->               
       
@endsection




