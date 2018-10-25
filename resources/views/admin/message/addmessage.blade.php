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
                        <h2 style="font-weight: bold;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Send Message </h2>
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
                            <form action="admin/message/add" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Student ID or Student Name:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                       <select style="width: 600px" id="studentid" required="required"  name="studentid" >
                                              <option></option>
                                              @foreach($student as $s)
                                                <option>{{$s->student_id}} - {{$s->name}}</option>
                                              @endforeach
                                        </select>
                                          @if ($errors->has('studentid'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('studentid') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4">Content:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <textarea id="content" name="content" rows="7" required="required" style="width: 600px;"></textarea>
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
