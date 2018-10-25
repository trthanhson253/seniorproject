@extends('admin.master')
@section('content')
 <div class="page-title">
            <div class="title_left">
                <p style="font-weight: 10px;color:blue;">Home >> Books >> Manage </p>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="border-radius: 10px;">
                            
                    <div class="x_title">
                        <h2 style="font-weight: bold;"><i class="fa fa-list" aria-hidden="true"></i> Manage Book </h2>
                        <ul class="nav navbar-right panel_toolbox">
                           
                            
                        </ul>
                        <div class="clearfix"></div>
                           <ul class="nav nav-pills">
                                <li role="presentation" ><a href="admin/books/list/all" ><i class="fa fa-table" aria-hidden="true"></i> List</a></li>
                                <li role="presentation" ><a href="admin/books/add" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></li>
                                <li role="presentation" class="active"><a href="admin/books/managebooks" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Manage Book</a></li>
                                                              
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
                                    
                                    
                                    <th>Copies</th>
                                    <th>Available</th>
                                    <th>Shelf</th>
                                    <th>Status</th>
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
                                
                                
                               
                                
                                <td>{{$bk->quantity}}</td>
                                <td>{{$bk->available}}</td>
                                <td>{{$bk->shelf}}</td>
                                @if($bk->status==1)
                                    <td style="font-weight: bold;">NEW</td>                
                                @elseif($bk->status==2)
                                    <td style="font-weight: bold;color:blue;">OLD</td>
                                @else
                                    <td style="font-weight: bold;color:red;">DAMAGED</td>
                                @endif
                                
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