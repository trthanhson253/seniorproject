@extends('master')
@section('content')
<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="upload/image/{{$books->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$books->title}}</p>
								<p class="single-item-price">
									<span>$ {{$books->price}}</span>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>Author:{{$books->author}} </p>
								<p>Publisher:{{$books->publisher}} </p>
								<p>ISBN:{{$books->isbn}} </p>
								<p>{{$books->available}} copies available </p>
							</div>
							<div class="space20">&nbsp;</div>
							@if($books->available>0)
							<p>Options:</p>
							<div class="single-item-options">
								
								<select class="wc-select" name="color">
									<option>Qty</option>
									<option value="1">1</option>
									
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
							@else
							<div>Out of stock</div>
							@endif
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a>Description</a></li>
							
						</ul>

						<div class="panel" id="tab-description">
							<p> {!! $books->description !!} </p>
						</div>
						
					</div>
					<div class="space50">&nbsp;</div>

		
		<br>
					<div class="beta-products-list">
						<h4>Related Books</h4>

						<div class="row">
							@foreach($relates as $r)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="books/{{$r->id}}"><img src="upload/image/{{$r->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title"><a href="books/{{$r->id}}">{{$r->title}}</a></p>
										<p class="single-item-price">
											<span>{{$r->price}}</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="books/{{$r->id}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>

@endsection