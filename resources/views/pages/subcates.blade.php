@extends('master')
@section('content')
		<div class="col-sm-9">
						<div class="beta-products-list">
							<p><a href="cates/{{$subcates->cates->id}}">{{$subcates->cates->name}}</a> << <a href="cates/subcates/{{$subcates->id}}">{{$subcates->name}}</a></p>
							<h4>{{$subcates->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($subcates->books)}} books found in {{$subcates->name}} today </p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								
								@foreach($books as $b)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="books/{{$b->id}}"><img src="upload/image/{{$b->image}}" alt="" width="200px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><a href="books/{{$b->id}}"> {{$b->title}}</a></p>
											<p class="single-item-price">
												<span>{{$b->price}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="books/{{$b->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
						<div style="text-align: center;">
						{{$books->links()}}
						</div>
						<div class="space50">&nbsp;</div>
						<h4>Others in Category {{$subcates->cates->name}} </h4>
						@foreach($sc as $s)
					<h4><a href="cates/subcates/{{$s->id}}">{{$s->name}}</a></h4>
					@endforeach
					
					</div>

					
@endsection