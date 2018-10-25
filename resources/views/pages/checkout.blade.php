@extends('master')
@section('content')
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-padding">              
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          <div class="panel panel-success">
            <div class="panel-body">   
            <legend class="text-left">Review Your Order</legend> 
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>ISBN</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach(Cart::content() as $row)
                    <tr>
                      <td>{!!$row->id!!}</td>
                      <td><img  src="{!!url('upload/image/'.$row->options->img)!!}" alt="img" width="100" height="100"></td>
                      <td>{!!$row->name!!}</td>
                      <td>{{$row->isbn}} </td>
                      <td class="text-center">                        
                          <span>{!!$row->qty!!}</span>
                      </td>
                      <td>{!!$row->price!!} </td>
                      
                      <td>{!!$row->qty * $row->price!!} </td>
                    </tr>
                  @endforeach                    
                    <tr>
                      <td colspan="3"><strong>Total :</strong> </td>
                      <td>{!!Cart::count()!!}</td>
                      <td colspan="2" style="color:red;">{!!Cart::subtotal();!!} </td>                      
                    </tr>                    
                  </tbody>
                </table>                
              </div>
              
              <form action="" method="POST" role="form">
              	<input type="hidden" name="_token" value="{{csrf_token()}}">
                <legend class="text-left">Student Information</legend>
                
                <div class="form-group">
                  <label for="">
                    Student Name : <strong>{{Auth::guard('students')->user()->name}} </strong><br>
                    Phone: <strong>{{Auth::guard('students')->user()->phone}} </strong><br>
                    Address: <strong> {{Auth::guard('students')->user()->address}} </strong><br>
                    Student ID: <strong> {{Auth::guard('students')->user()->student_id}} </strong><br>
                    Email: <strong> {{Auth::guard('students')->user()->email}} </strong><br>
                  </label>
                </div>               
                          
                <button type="submit" class="btn btn-primary pull-right"> Check Out </button> 
              </form>
              
            </div>
          </div>   
        </div>
      </div>     
    </div> 
@endsection