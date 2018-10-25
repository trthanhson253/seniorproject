@extends('master')
@section('content')
<div id="content" class="space-top-none">
			<div class="main-content">
				
							
				<div class="row">

					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Top Books</h4>
							<div class="beta-products-details">
								<p class="pull-left">438 styles found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/assets/dest/images/products/1.jpg" alt="" width="100px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">Sample Woman Top</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/assets/dest/images/products/1.jpg" alt="" width="100px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">Sample Woman Top</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/assets/dest/images/products/1.jpg" alt="" width="100px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">Sample Woman Top</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .end -->

						<div class="beta-products-list">
							@foreach($cates as $ct)

							<h5 style="background-color: grey;">
		                		<a href="category.html"><b>{{$ct->name}}<b></a>
		                			@foreach($ct->subCates as $sc)
		                			@if(count($ct->subCates)>0)
		                			
		                		<small><a href="category.html"> {{$sc->name}}</a>| </small>
		                			@else
		                			<small></small>
		                			
		                			@endif
		                			@endforeach		                			               		
		                	</h5>                	
							<div class="beta-products-details">
								<p class="pull-left">There are {{count($ct->books)}} books found in this category today</p>
								<div class="clearfix"></div>
							</div>
							<?php
								$bks=$ct->books->sortByDesc('created_at')->take(3);
							?>	
												
							<div class="row">
								@foreach($bks->all() as $b)	
								<div class="col-sm-3">
									
									<div class="single-item">
										<div class="single-item-header">
											<a href="books/{{$b['id']}}"><img src="upload/image/{{$b->image}}" alt="" width="170px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><a href="books/{{$b['id']}}">{{$b['title']}}</a></p>
											
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="addtocart/{{$b['id']}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="books/{{$b['id']}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									
								</div>
								@endforeach
								
							</div>

							<br>
							@endforeach
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->

@endsection