@extends('admin.master')
@section('content')
 <div class="page-title">
            <div class="title_left">
                
                    <p style="font-weight: 10px;color:blue;">Home >> Subcategory >> List </p>
                
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;">
                    @if(session('warning'))
                    <div class="alert alert-success">
                        {{session('warning')}}
                    </div>
                    @endif        
                    <div class="x_title">
                        <h2 style="font-weight: bold;"><i class="fa fa-table" aria-hidden="true"></i>  Sub-Category List</h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                 

                                    <select name="sltCate" id="input" class="form-control" style="width: 300px;color: blue;font-weight: bold;">

                                        <option>----------Choose a category----------</option>
                                        <option value="admin/subcates/list/all" style="font-weight: bold;">All</option>
                                        @foreach($cates as $c)
                                        <option value="admin/subcates/list/{{$c->id}}" style="font-weight: bold;">{{$c->name}}</option>
                                         @endforeach              
                                    </select>
                                    <script>
                                        document.getElementById("input").onchange = function() {
                                            if (this.selectedIndex!==0) {
                                                window.location.href = this.value;
                                            }        
                                        };
                                    </script>
                                
                            
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                                <li role="presentation" class="active"><a href="admin/subcates/list/all" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                <li role="presentation" ><a href="admin/subcates/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li> 
                        
                               
                            

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
                                    <th>SubCategory Name</th>
                                    <th>Category Name</th>                
                                    <th>Edit</th>
                                    <th>Delete</th>
                                                            
                                </tr>
                            </thead>

                           
                            <tbody>
                            @foreach($subcates as $sc)
                            <tr>
                                <td>{{$sc->id}}</td>
                                <td>{{$sc->name}}</td>
                                <td style="font-weight: bold;color: blue;">{{$sc->cates->name}}</td>
                                <td>
                                    <a class="btn btn-warning" href="admin/subcates/edit/{{$sc->id}}">
                                            <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="admin/subcates/delete/{{$sc->id}}" onclick="return confirm('Do you really want to delete this subcategory ?');">
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