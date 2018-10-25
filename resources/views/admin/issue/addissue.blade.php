@extends('admin.master')
@section('content')

 <div class="page-title">
            <div class="title_left">
                
                 <p style="font-weight: 10px;color:blue;">Home >> Issue >> Add </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;" >
                    <div class="x_title" >
                        <h2 style="font-weight: bold;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Issue </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="nav nav-pills">
                              <ul class="nav nav-pills">
                                <li role="presentation" ><a href="admin/issue/list" ><i class="fa fa-table" aria-hidden="true"></i> Borrowed Books List</a></li>
                                <li role="presentation" class="active"><a href="admin/issue/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Issue Books </a></li>
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
                            <form action="admin/issue/add" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Student ID:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        
                                        <select style="width: 400px;" id="studentid" name="studentid" value="{{ old('studentid') }}" >
                                               <option></option>
                                              @foreach($studentid as $s)
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
                                    <label class="control-label col-md-4">ISBN or Title:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        
                                        <select style="width: 400px;" id="isbn" name="isbn" value="{{ old('isbn') }}" >
                                              <option></option>
                                               @foreach($books as $b)
                                                <option value="{{$b->isbn}}">{{$b->isbn}} - {{$b->title}}</option>
                                              @endforeach
                                            </select>
                                         @if ($errors->has('isbn'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('isbn') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Date Return:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        
                                        <input type="date" data-form-field="book-issue-id" name="returndate" class="span8" style="width: 200px">
                                        <br>
                                        @if ($errors->has('returndate'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('returndate') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>

                                </div>
                               
                    
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Add </button>
                                        
                                        
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
      $("#isbn").select2({
            placeholder: "Select ISBN",
            allowClear: true
        });
      $("#title").select2({
            placeholder: "Select Title",
            allowClear: true
        });
</script>




@endsection
