@extends('admin.master')
@section('content')

 <div class="page-title">
            <div class="title_left">
                
                    <p style="font-weight: 10px;color:blue;">Home >> Subcategory >> Edit </p>
                
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;" >
                    <div class="x_title" >
                        
                        <h2 style="font-weight: bold;"><i class="fa fa-edit"></i> Edit SubCategory</h2>
                        <ul class="nav navbar-right panel_toolbox">
                           
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="nav nav-pills">
                                <li role="presentation" ><a href="admin/subcates/list/all" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                <li role="presentation" ><a href="admin/subcates/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li>                               
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
                            <form action="admin/subcates/edit/{{$subcates->id}}" method="post" class="form-horizontal form-label-left">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Category:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <select name="choosecates" class="select2_single form-control" tabindex="-1" required="required">
                                        @foreach($cates as $ct)
                                        <option
                                        @if($subcates->idCates==$ct->id)
                                             {{"selected"}}                           
                                        @endif    
                                            value="{{$ct->id}}">{{$ct->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Sub-Category Name:<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="name" id="name" value="{{$subcates->name}}" class="form-control col-md-7 col-xs-12">
                                        @if ($errors->has('name'))
                                            <span style="color:red;" >                   
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>                                    
                                        @endif
                                        <br>
                                    </div>
                                </div>
                               
                    
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit </button>
                                        
                                        
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


