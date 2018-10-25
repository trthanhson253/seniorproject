@extends('admin.master')
@section('content')

 <div class="page-title">
            <div class="title_left">
                
                 <p style="font-weight: 10px;color:blue;">Home >> Return >> Detail </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;" >
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
                             @if(session('warning'))
                                <ul class="alert alert-success">
                                <li>{{session('warning')}}</li>    
                                </ul>                 
                            @endif
                            <form action="admin/issue/editdetail/{{$returns->id}}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <p>Student ID: {{$returns->students->student_id}}</p>
                                    <p>Student Name: {{$returns->students->name}}</p>
                                    <p>Phone Number: {{$returns->students->phone}}</p>
                                    <p>Address: {{$returns->students->address}}</p>
                                    <p>Email: {{$returns->students->email}}</p>
                                    <p>Book Title:{{$returns->books->title}}</p>
                                    <p>Book ISBN: {{$returns->books->isbn}}</p>
                                    <p>Date Borrowed: {{$returns->borroweddate}} </p>
                                    <p>Due Date: {{$returns->duedate}} </p>
                                    <p>Date Return: {{$returns->created_at}}</p>
                                    <p>Number of Due Days: <?php
                                        $date1 = new DateTime($returns->created_at);
                                        $date2 = new DateTime($returns->duedate);
                                        if($date1>$date2){
                                            $diff = date_diff($date1,$date2);                    
                                            echo $diff->format("%a");
                                        }else{
                                            echo "0";
                                        }                                    
                                        ?></p>
                                    <p>Condition of book: 
                                            @if($returns->status==1)                                                             
                                                 <span>Normal</span>
                                                 @elseif($returns->status==2)
                                                 <span>Damaged</span>
                                                 @elseif($returns->status==3)
                                                 <span>Lost</span>
                                                 @endif
                                             </p>
                                    <p>Notes: 
                                        <textarea name="notes" rows="3">{{$returns->notes}}</textarea>
                                    </p>

                                    <p>Penalty:
                                        <?php
                                        $date1 = new DateTime($returns->created_at);
                                        $date2 = new DateTime($returns->duedate);
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
                                        ?>
                                    </p>
                                     
                                    <p>Remarks:                                 
                                        <input name="paid" value="0" 
                                            @if($returns->paid==0)
                                                {{"checked"}}
                                            @endif
                                            type="radio"
                                            >Unpaid Fines                                                                                
                                        <input name="paid" value="1" 
                                            @if($returns->paid==1)
                                                    {{"checked"}}
                                                @endif

                                                 type="radio"
                                                 >Paid Fines
                                        
                                        
                                   
                                    </p>

                                    


                                </div>

                               
                               
                    
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> UPDATE... </button>
                                        
                                        
                                    </div>
                                </div>
                            </form>
                            
                                                    
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>


</div><!---end-->
                            <!-- /page content -->

                        <!-- footer content -->
@endsection

