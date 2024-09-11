@extends('master')
@section('content')

<!-- <div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
			<div class="banner" >
				<ul>
					@foreach ($slide as $sld)
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
							<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sld->image}}" data-src="source/image/slide/{{$sld->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sld->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
							</div>
						</div>

					</li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="tp-bannertimer"></div>
	</div>
</div> -->
	<!--slider-->
	
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($new_products)}} products</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_products as $new_prd)
								<div class="col-sm-3" style="margin-bottom: 20px;">
									<div class="single-item">
									@if($new_prd->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="product_detail/{{$new_prd->id}}"><img src="source/image/product/{{$new_prd->image}}" alt="" height="260px" width="265px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new_prd->name}}</p>
											<p class="single-item-price">
												@if($new_prd->promotion_price == 0)
												<span class="flash-sale">{{number_format($new_prd->unit_price)}}</span>
												@else
												<span class="flash-del">{{number_format($new_prd->unit_price)}}</span>
												<span class="flash-sale">{{number_format($new_prd->promotion_price)}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption" style="margin-top: 10px;">
											<a class="add-to-cart pull-left" href="add2cart/{{$new_prd->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product_detail/{{$new_prd->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach

								<div class="row">{{$new_products->links()}}</div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="beta-products-list">
							<h4>Best Sellers</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($best_sellers)}} products</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($best_sellers as $best_prd)
								<div class="col-sm-3" style="margin-bottom: 20px;">
									<div class="single-item">
									@if($best_prd->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="product_detail/{{$best_prd->id}}"><img src="source/image/product/{{$best_prd->image}}" alt="" height="260px" width="265px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$best_prd->name}}</p>
											<p class="single-item-price">
												@if($best_prd->promotion_price == 0)
												<span class="flash-sale">{{number_format($best_prd->unit_price)}}</span>
												@else
												<span class="flash-del">{{number_format($best_prd->unit_price)}}</span>
												<span class="flash-sale">{{number_format($best_prd->promotion_price)}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption" style="margin-top: 10px;">
											<a class="add-to-cart pull-left" href="add2cart/{{$best_prd->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product_detail/{{$best_prd->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach

								<div class="row">{{$best_sellers->links()}}</div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->


@endsection