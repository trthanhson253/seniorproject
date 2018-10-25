@extends('master')
@section('content')
		<div class="col-sm-9">
						<div class="beta-products-list">
		<?php
		function color($str,$key){
			return str_replace($key,"<span style='color:red;text-decoration:bold;font-weight:bold;'>$key</span>",$str);
		}
		 ?>					
							<h4>Search Results: "{{$key}}"</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($books)}} books results found</p>
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
											<p class="single-item-title"><a href="books/{{$b->id}}"> {!! color($b->title,$key) !!}</a></p>
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
						
					
					
					</div>

					
@endsection