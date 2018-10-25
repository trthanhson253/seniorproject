@extends('admin.master')
@section('content')

 <div class="page-title">
            <div class="title_left">
                
                 <p style="font-weight: 10px;color:blue;">Home >> Message >> Add </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;" >
                    <div class="x_title" >
                        <h2 style="font-weight: bold;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Send Message for {{$issue->students->name}} </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="nav nav-pills">
                               <ul class="nav nav-pills">
                                 <li role="presentation" ><a href="admin/message/list" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                <li role="presentation" class="active"><a href="admin/message/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Send Message</a></li>
                                
                                
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
                            <form action="admin/issue/sendmessage/{{$issue->id}}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <p>Student ID: {{$issue->students->student_id}}</p>
                                    <p>Student Name: {{$issue->students->name}}</p>
                                    <p>Phone Number: {{$issue->students->phone}}</p>
                                    <p>Address: {{$issue->students->address}}</p>
                                    <p>Email: {{$issue->students->email}}</p>
                                    <p>Book Title:{{$issue->books->title}}</p>
                                    <p>Book ISBN:{{$issue->books->isbn}}</p>
                                    <p>Initial Return Date: {{$issue->returndate}}</p>
                                    <p>Status:</p>
                                         @if($issue->returndate<$now)
                                        <div style="color: red;font-weight: bold;">EXPIRED</div>
                                        @else
                                        <div style="color: blue;font-weight: bold;">VALID</div>
                                        @endif 
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Content:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <textarea id="content" name="content" rows="3" style="width: 200px;" ></textarea>
                                         @if ($errors->has('content'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('content') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>
                                </div>
                               
                    
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Send... </button>
                                        
                                        
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

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#studentid").select2({
            placeholder: "Select Student ID",
            allowClear: true
        });
     
</script>

@endsection
