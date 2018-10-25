@extends('admin.master')
@section('content')

 <div class="page-title">
            <div class="title_left">
                
                    <p style="font-weight: 10px;color:blue;">Home >> Books >> Edit </p>
                
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;" >
                    <div class="x_title" >
                        
                        <h2 style="font-weight: bold;"><i class="fa fa-edit"></i> Edit Book</h2>
                        <ul class="nav navbar-right panel_toolbox">
                           
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="nav nav-pills">
                                <li role="presentation" ><a href="admin/books/list/all" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                <li role="presentation"><a href="admin/books/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li>
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
                            <form action="admin/books/edit/{{$books->id}}" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                
                                <table >
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Title: <span class="required" style="color:red;">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" required="required" name="title" id="title" value="{{$books->title}}" placeholder="Add Title" class="form-control col-md-7 col-xs-12">
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
                                                    <input type="text" required="required" value="{{$books->author}}" name="author" placeholder="Add Author" id="author" class="form-control col-md-7 col-xs-12">

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
                                                    <input type="text" required="required" name="publisher" value="{{$books->publisher}}" placeholder="Add Publisher" class="form-control col-md-7 col-xs-12">
                                            </div>
                                            </div>
                                        </td>
                                         <td>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">ISBN: <span class="required" style="color:red;">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" required="required" name="isbn" value="{{$books->isbn}}" placeholder="Add ISBN" id="isbn" class="form-control col-md-7 col-xs-12">
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
                                                    <input type="number" required="required" value="{{$books->quantity}}" name="quantity" placeholder="Add Quantity" class="form-control col-md-7 col-xs-12">
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
                                                    <input type="number" required="required" value="{{$books->available}}" name="available" placeholder="Add Available" class="form-control col-md-7 col-xs-12">
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
                                                        <option 
                                                        @if($books->subCates->cates->id==$ct->id)
                                                        {{"selected"}}
                                                        @endif
                                                        placeholder="Add Category" value="{{$ct->id}}">{{$ct->name}}</option>
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
                                                    <select class="select2_single form-control" tabindex="-1" required="required" id="subcates" name="choosesubcates">
                                                        @foreach($subcates as $sct)                                    
                                                            <option
                                                            @if($books->subCates->id==$sct->id)
                                                            {{"selected"}}
                                                            @endif

                                                            placeholder="Add Sub-Category" value="{{$sct->id}}">{{$sct->name}}</option>
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
                                                    
                                                    <img width="100px" src="upload/image/{{$books->image}}" >
                                                   

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
                                                    <input type="text" required="required" name="shelf" id="shelf" value="{{$books->shelf}}" placeholder="Add Shelf" class="form-control col-md-7 col-xs-12">
                                                     
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
                                                <input name="status" value="1" 
                                                @if($books->status==1)
                                                    {{"checked"}}
                                                @endif

                                                 type="radio"
                                                 >New
                                        </label>
                                        <label class="radio-inline">
                                                <input name="status" value="2"  
                                                @if($books->status==2)
                                                    {{"checked"}}
                                                @endif

                                                 type="radio"
                                                 >Old
                                        </label>
                                        <label class="radio-inline">
                                                <input name="status" value="3"  
                                                @if($books->status==3)
                                                    {{"checked"}}
                                                @endif

                                                 type="radio"
                                                 >Damaged
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-1">Add Description:
                                    </label>
                                    <div class="col-md-8">
                                        <textarea id="demo" class="form-control ckeditor" name="description" rows="5">
                                            {{$books->description}}
                                        </textarea>
                                    </div>
                                </div>
                                
                                <hr>
                                <h3>Manage Comments for {{$books->title}} </h3>
                                 <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                
                            <thead style="background-color: #1A82C3;color:white; ">
                                <tr>
                                    <th>ID</th>
                                    <th>Student</th>
                                    <th>Headline</th>
                                    <th>Content</th>                
                                    <th>Posted Date</th>
                                    <th>Delete</th>
                                                          
                                </tr>
                            </thead>

                            <tbody>
                               @foreach($books->comment as $cm)
                           
                            <tr>
                                <td>{{$cm->id}}</td> 
                                <td>{{$cm->student->name}}</td>  
                                <td>{{$cm->headline}}</td>  
                                <td>{{$cm->content}}</td> 
                                <td>{{$cm->created_at}}</td> 
                                <td>
                                    <a class="btn btn-danger" href="admin/comment/delete/{{$cm->id}}/{{$books->id}}" onclick="return confirm('Do you really want to delete this comment ?');">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                                            
                                </td> 
                                
                            </tr>
                                                        
                              @endforeach                      
                            </tbody>
                            </table>
                        </div>
                               
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="admin/books/list/all"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
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