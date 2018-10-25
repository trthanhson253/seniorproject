@extends('master')
@section('content')
 <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-padding">              
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          <div class="panel panel-success" style="min-height: auto;">
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
            </div>
          @endif
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Qty</th>                      
                      <th>Action</th>
                      <th>Price</th>                      
                    </tr>
                  </thead>
                  <tbody>
                  @foreach(Cart::content() as $row)
                    <tr>
                      <td>{!!$row->id!!}</td>
                      <td><img  src="{!!url('upload/image/'.$row->options->img)!!}" alt="img" width="100" height="100"></td>
                      <td>{!!$row->name!!}</td>
                      <td>{!!$row->qty!!}</td>
                      <td><a href="{!!url('delcart/'.$row->rowId)!!}"><span class="glyphicon glyphicon-remove" style="padding:5px; font-size:18px; color:red;"></span></a></td>
                      <td>${!! number_format($row->price) !!}.00</td>
                      
                    </tr>
                  @endforeach                    
                    <tr>
                      <td colspan="3"><strong>Total:</strong> </td>
                      <td>{!!Cart::count()!!}</td>
                      <td></td>
                      <td colspan="2" style="color:red;">${!!Cart::subtotal()!!}</td>                      
                    </tr>                    
                  </tbody>
                </table>                
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 no-paddng">
              @if(Cart::count() !=0)
                @if(Auth::guard('students')->check())
                  <form action="{!!url('/checkout')!!}" method="get" accept-charset="utf-8">                                       
                     <button type="submit" class="btn btn-large btn-primary pull-right">Checkout</button>                     
                  </form>
                @else              
                  <a class="btn btn-large btn-warning pull-right" href="{!!url('/login')!!}" >Checkout</a>
                  
                @endif
              @endif
              </div>
              <hr>
            </div>
          </div>   
        </div>
      </div>     
    </div> 

@endsection