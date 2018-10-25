@extends('admin.master')
@section('content')
 <div class="page-title">
            <div class="title_left">
                <p style="font-weight: 10px;color:blue;">Home >> Books >> List </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;">
                            
                    <div class="x_title">
                         @if(session('warning'))
                                <ul class="alert alert-success">
                                <li>{{session('warning')}}</li>    
                                </ul>                 
                            @endif
                        <h2 style="font-weight: bold;"><i class="fa fa-list" aria-hidden="true"></i> Book List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                           <li>                                
                                    <select name="choosecates" id="cates" class="form-control"  style="width: 200px;color: blue;font-weight: bold;">

                                        <option>-Choose a category-</option>
                                        @foreach($cates as $ct)
                                        <option value="{{$ct->id}}" style="font-weight: bold;">{{$ct->name}}</option>
                                        @endforeach                   
                                    </select>                                   
                            </li>
                            <li>
                                 

                                    <select name="choosesubcates" id="subcates"  class="form-control" style="width: 220px;">

                                        <option>-Choose a subcategory-</option>
                                        
                                        @foreach($subcates as $sct)                                        
                                        <option value="admin/books/list/{{$sct->id}}">{{$sct->name}}</option>
                                        @endforeach               
                                    </select>
                                    <script>
                                        document.getElementById("subcates").onchange = function() {
                                            if (this.selectedIndex!==0) {
                                                window.location.href = this.value;
                                            }        
                                        };
                                    </script>
                                
                            
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                                <li role="presentation" class="active"><a href="admin/books/list/all" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                <li role="presentation" ><a href="admin/books/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li>
                                <li role="presentation" ><a href="admin/books/managebooks" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Manage Book</a></li>          
                                                              
                            </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                
                            <thead style="background-color: #1A82C3;color:white; ">
                                <tr>
                                    <th>ID</th>
                                    <th>ISBN</th>
                                    <th>Title</th>                
                                    <th>Author</th>
                                    <th>Publisher</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Shelf</th>
                                    <th>Copies</th>
                                    <th>Available</th>
                                    <th>Remarks</th>
                                    <th>SubCategory</th>
                                    <th>Category</th>
                                    <th>Edit</th>  
                                    <th>Delete</th>                             
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n=0 ?>
                                    @foreach($books as $bk)
                                <?php $n=$n+1 ?>
                           
                            <tr>
                                <td>{!! $n !!}</td>  
                                <td>{{$bk->isbn}}</td>                             
                                <td>{{$bk->title}}</td>
                                <td>{{$bk->author}}</td>
                                <td>{{$bk->publisher}}</td>
                                
                                <td>{{$bk->description}}</td>
                                <td><img style="width:30px;" src="upload/image/{{$bk->image}}" /></td>
                                <td>{{$bk->shelf}}</td>
                                <td>{{$bk->quantity}}</td>
                                <td>{{$bk->available}}</td>
                                @if($bk->available>10)
                                    <td style="font-weight: bold;">AVAILABLE</td>                
                                @elseif($bk->available<=10 && $bk->available>=1)
                                    <td style="font-weight: bold;color:blue;">LOW STOCK</td>
                                @else
                                    <td style="font-weight: bold;color:red;">NOT AVAILABLE</td>
                                @endif
                                <td><strong style="color:blue;">{{$bk->subCates->name}}</strong></td>
                                <td><strong style="color:purple;">{{$bk->subCates->cates->name}}</strong></td>
                                <td>
                                    <a class="btn btn-warning" href="admin/books/edit/{{$bk->id}}">
                                            <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="admin/books/delete/{{$bk->id}}" onclick="return confirm('Do you really want to delete this category ?');">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                                            
                                </td> 
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
               
          
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $("#cates").change(function(){
            var idcates= $(this).val();
            $.get("admin/ajax/subcates1/"+idcates,function(data){
                $("#subcates").html(data);
            });

        });

    });

</script>
@endsection