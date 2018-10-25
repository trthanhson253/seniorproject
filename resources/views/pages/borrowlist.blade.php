@extends('master')
@section('content')

<h3>Borrowed Books from {{$user->name}}<a class="btn icon-btn btn-success" style="float:right;" href="admin/books/add">
<span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success" ></span>
Add more Books +
</a></h3>                       
                        <hr>
                        <br>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table id="example" class="table table-bordered table-hover table-striped" cellspacing="0" width="auto" style="border-radius: 10px; color:black;">
                        <thead>
                        <tr style="font-weight: bold;">
                           
                            <td>ISBN</td>
                            <td>Title</td>
                            <td>Author</td>                  
                            <td>Return Date</td>
                            <td>Status</td>
                            
                           
                        </tr>
                    </thead>
                        <tbody style="text-align: center;">
                     @foreach($issue as $i)
                        <tr>                            
                            <td>{{$i->books->isbn}}</td>
                            <td>{{$i->books->title}}</td>                          
                            <td>{{$i->books->author}}</td>
                            <td>{{$i->returndate}}</td>
                            @if($i->returndate<$now)
                            <td style="color: red;font-weight: bold;">EXPIRED.YOU NEED TO RETURN BOOK</td>
                            @else
                            <td style="color: blue;font-weight: bold;">VALID</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                    </table>

@endsection