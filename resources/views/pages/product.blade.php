@extends('master')
@section('content')

<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$typeOfProd[0]->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index">Home</a> / <span>{{$typeOfProd[0]->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="row">
							<div class="col-sm-4">
								<img src="source/image/product/{{$product->image}}" alt="" height="250px">
							</div>
							<div class="col-sm-8">
								<div class="single-item-body">
									<p class="single-item-title">{{$product->name}}</p>
									<p class="single-item-price">
										@if($product->promotion_price == 0)
										<span class="flash-sale">{{number_format($product->unit_price)}}</span>
										@else
										<span class="flash-del">{{number_format($product->unit_price)}}</span> <br> <br>
										<span class="flash-sale">{{number_format($product->promotion_price)}}</span>
										@endif
									</p>
								</div>
	
								<div class="clearfix"></div>
								<div class="space20">&nbsp;</div>
	
								<div class="single-item-desc">
									<p>{{$product->description}}</p>
								</div>
								<div class="space20">&nbsp;</div>

								<a class="add-to-cart" href="add2cart/{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="space40">&nbsp;</div>
						
						<div class="woocommerce-tabs">
							<ul class="tabs">
								<li><a href="#tab-description">Description</a></li>
								<li><a href="#tab-reviews">Reviews (0)</a></li>
							</ul>

							<div class="panel" id="tab-description">
								<p>{{$typeOfProd[0]->description}}</p>
							</div>
							<div class="panel" id="tab-reviews">
								<p>No Reviews</p>
							</div>
						</div>
						<div class="space50">&nbsp;</div>
						
						<div class="beta-products-list">
							<h4>Related Products</h4>
	
							<div class="row">
								@foreach($relatedProds as $rlPr)
									<div class="col-sm-4" style="margin-bottom: 20px;">
										<div class="single-item">
										@if($rlPr->promotion_price != 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
											<div class="single-item-header">
												<a href="product_detail/{{$rlPr->id}}"><img src="source/image/product/{{$rlPr->image}}" alt="" height="260px" width="265px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$rlPr->name}}</p>
												<p class="single-item-price">
													@if($rlPr->promotion_price == 0)
													<span class="flash-sale">{{number_format($rlPr->unit_price)}}</span>
													@else
													<span class="flash-del">{{number_format($rlPr->unit_price)}}</span>
													<span class="flash-sale">{{number_format($rlPr->promotion_price)}}</span>
													@endif
												</p>
											</div>
											<div class="single-item-caption" style="margin-top: 10px;">
												<a class="add-to-cart pull-left" href="add2cart/{{$rlPr->id}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="product_detail/{{$rlPr->id}}">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
								<div class="row">{{$relatedProds->links()}}</div>
							</div>
						</div> <!-- .beta-products-list -->
					</div>

				</div>

				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							@foreach($best_sellers as $best_prd)
								<div class="media beta-sales-item">
									<a class="pull-left" href="product_detail/{{$best_prd->id}}"><img src="source/image/product/{{$best_prd->image}}" alt=""></a>
									<div class="media-body">
										{{$best_prd->name}}
										<p class="single-item-price">
											@if($best_prd->promotion_price == 0)
											<span class="flash-sale">{{number_format($best_prd->unit_price)}}</span>
											@else
											<span class="flash-del">{{number_format($best_prd->unit_price)}}</span>
											<span class="flash-sale">{{number_format($best_prd->promotion_price)}}</span>
											@endif
										</p>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->

					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($new_products as $new_prd)
								<div class="media beta-sales-item">
									<a class="pull-left" href="product_detail/{{$new_prd->id}}"><img src="source/image/product/{{$new_prd->image}}" alt=""></a>
									<div class="media-body">
										{{$new_prd->name}}
										<p class="single-item-price">
											@if($new_prd->promotion_price == 0)
											<span class="flash-sale">{{number_format($new_prd->unit_price)}}</span>
											@else
											<span class="flash-del">{{number_format($new_prd->unit_price)}}</span>
											<span class="flash-sale">{{number_format($new_prd->promotion_price)}}</span>
											@endif
										</p>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection