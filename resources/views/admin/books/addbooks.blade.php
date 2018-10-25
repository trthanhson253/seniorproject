@extends('admin.master')
@section('content')

 <div class="page-title">
            <div class="title_left">
                
                    <p style="font-weight: 10px;color:blue;">Home >> Books >> Add </p>
                
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;" >
                    <div class="x_title" >
                        
                        <h2 style="font-weight: bold;"><i class="fa fa-plus"></i> Add Book</h2>
                        <ul class="nav navbar-right panel_toolbox">
                           
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="nav nav-pills">
                                <li role="presentation" ><a href="admin/books/list/all" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                <li role="presentation" class="active"><a href="admin/books/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li>
                                <li role="presentation" ><a href="admin/books/managebooks" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Manage Book</a></li>                          
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
                            <form action="admin/books/add" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                
                                <table >
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Title: <span class="required" style="color:red;">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" required="required" name="title" id="title" value="{!! old('title') !!}" placeholder="Add Title" class="form-control col-md-7 col-xs-12">
                                                     @if ($errors->has('title'))
                                                        <span style="color:red;" >                   
                                                            <strong>{{ $errors->first('title') }}</strong>
                                                        </span>                                    
                                                    @endif
                                        <br>
                                            </div>
                                            </div>
                                        </td>

                                         <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Author:</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" required="required" value="{!! old('author') !!}" name="author" placeholder="Add Author" id="author" class="form-control col-md-7 col-xs-12">

                                            </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Publisher:</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" required="required" name="publisher" value="{!! old('publisher') !!}" placeholder="Add Publisher" class="form-control col-md-7 col-xs-12">
                                            </div>
                                            </div>
                                        </td>
                                         <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">ISBN: <span class="required" style="color:red;">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" required="required" name="isbn" value="{!! old('isbn') !!}" placeholder="Add ISBN" id="isbn" class="form-control col-md-7 col-xs-12">
                                                     @if ($errors->has('isbn'))
                                                        <span style="color:red;" >                   
                                                            <strong>{{ $errors->first('isbn') }}</strong>
                                                        </span>                                    
                                                    @endif
                                            </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Copies:<span class="required" style="color:red;">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="number" required="required" value="{!! old('quantity') !!}" name="quantity" placeholder="Add Quantity" class="form-control col-md-7 col-xs-12">
                                                      @if ($errors->has('quantity'))
                                                        <span style="color:red;" >                   
                                                            <strong>{{ $errors->first('quantity') }}</strong>
                                                        </span>                                    
                                                    @endif
                                            </div>
                                            </div>
                                        </td>
                                         <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Available: <span class="required" style="color:red;">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="number" required="required" value="{!! old('available') !!}" name="available" placeholder="Add Available" class="form-control col-md-7 col-xs-12">
                                            </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="last-name">Category: <span class="required" style="color:red;">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <select class="select2_single form-control" tabindex="-1" required="required" id="cates" name="choosecates">
                                                        @foreach($cates as $ct)
                                                        <option value="{{$ct->id}}">{{$ct->name}}</option>
                                                        @endforeach    
                                                    </select>
                                                </div>
                                             </div>
                                        </td>
                                         <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="last-name">Subcategory:
                                                </label>
                                                <div class="col-md-8">
                                                    <select class="select2_single form-control" tabindex="-1" id="subcates" name="choosesubcates">
                                                        @foreach($subcates as $sct)                                    
                                                            <option required="required" value="{{$sct->id}}">{{$sct->name}}</option>
                                                        @endforeach
                                            
                                                    </select>
                                                </div>
                                             </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Price:
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="price" value="0" placeholder="Add Price (in US Dollars)" class="form-control col-md-7 col-xs-12">
                                            </div>
                                            </div>
                                        </td>
                                         <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Image:
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="file" style="height:44px;" name="image" value="{!! old('image') !!}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                         <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Shelf:</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" required="required" name="shelf" id="shelf" value="{!! old('shelf') !!}" placeholder="Add Shelf" class="form-control col-md-7 col-xs-12">
                                                     
                                        <br>
                                            </div>
                                            </div>
                                        </td>

                                    </tr>
                                 </table>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-1">Status:
                                    </label>
                                    <div class="col-md-8">
                                        <label class="radio-inline">
                                                <input name="status" value="1" checked="" type="radio">New
                                        </label>
                                        <label class="radio-inline">
                                                <input name="status" value="2" type="radio">Old
                                        </label>
                                        <label class="radio-inline">
                                                <input name="status" value="3" type="radio">Damaged
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-1">Add Description:
                                    </label>
                                    <div class="col-md-8">
                                        <textarea id="demo" class="form-control ckeditor" name="description" rows="5"></textarea>
                                    </div>
                                </div>
                                
                                
                               
                               
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="admin/books/list/all"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
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
<script>
    $(document).ready(function(){
        $("#cates").change(function(){
            var idcates= $(this).val();
            $.get("admin/ajax/subcates/"+idcates,function(data){
                $("#subcates").html(data);
            });

        });

    });

</script>
@endsection