@extends('admin.master')
@section('content')        
 <div class="page-title">
            <div class="title_left">
               <p style="font-weight: 10px;color:blue;">Home >> Issue >> Returnlist </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;">
                            
                    <div class="x_title">
                        <h2 style="font-weight: bold;"><i class="fa fa-list" aria-hidden="true"></i> Returned Book History</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                            
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                                <li role="presentation" ><a href="admin/issue/list" ><i class="fa fa-table" aria-hidden="true"></i> Borrowed Books List</a></li>
                                <li role="presentation" ><a href="admin/issue/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Issue Books </a></li>
                                <li role="presentation" class="active"><a href="admin/issue/returnlist" ><i class="fa fa-sign-out"></i> Returned Books List</a></li>
                                
                                
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
                                    
                                    <th>Student ID</th>                
                                    <th>Student Name</th>
                                    <th>Book Title</th>
                                    <th>Book ISBN</th>
                                    <th>Date Borrowed</th>
                                    <th>Due Date</th>
                                    <th>Date Return</th>
                                    <th>Number of Due Days</th>
                                    <th>Condition</th>
                                    <th>Notes</th>
                                    <th>Remarks</th>
                                    <th>Penalty</th>
                                    <th>Edit</th>
                                    
                                                            
                            </thead>
                            <tbody>
                            @foreach($returns as $r)
                        <tr>
                                               
                            <td>{{$r->students->student_id}}</td>
                            <td><a href="admin/students/detail/{{$r->students->id}}" style="color:blue;font-weight: bold;">{{$r->students->name}}</a></td>
                            
                            
                            <td>{{$r->books->title}}</td>
                           
                            <td>{{$r->books->isbn}}</td>
                            
                                
                                <td>{{$r->borroweddate}}</td>
                                
                                <td>{{$r->duedate}}</td>
                                <td>{{$r->created_at}}</td>

                                <td>
                                    <?php
                                        $date1 = new DateTime($r->created_at);
                                        $date2 = new DateTime($r->duedate);
                                        if($date1>$date2){
                                            $diff = date_diff($date1,$date2);                    
                                            echo $diff->format("%a");
                                        }else{
                                            echo "0";
                                        }                                    
                                        ?></td>  
                                @if($r->status==1)                                                             
                                 <td>Normal</td>
                                 @elseif($r->status==2)
                                 <td>Damaged</td>
                                 @elseif($r->status==3)
                                 <td>Lost</td>
                                 @endif
                                 <td>{{$r->notes}}</td>
                                 @if($r->paid==0)
                                 <td style="color: red; font-weight: bold;">UNPAID</td>
                                 @else
                                  <td style="color: blue;font-weight: bold;">PAID</td>
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
                                        <td><a class="btn btn-warning" href="admin/issue/editdetail/{{$r->id}}">
                                            <i class="fa fa-edit"></i>
                                    </a></td>                                
                                                                           
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
    <h2>KSU POLICY FINES</h2>
    <ul>
        <li>Overdue fines accrue at the rate of $0.50 per book, per day.</li>
        <li>Maximum fine of $35 per item.</li>
        <li>Students owing fines in excess of $10 will be unable to check-out or renew material until the fine is paid.</li>
        <li>Delinquent accounts may result in an administrative hold that could prevent registration for future terms and possibly graduation.</li>
        <li>Lost or Damaged Items:  Replacement cost determined by library, a $35 processing fee and applicable overdue fees.</li>
    </ul>
    <br>
@endsection




