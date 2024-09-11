@extends('master')
@section('content')

<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index">Home</a> / <a href="product_type/0">Products</a> / <span>{{$getNameType}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
						@foreach($prd_types as $prd_tp)
							<li><a href="product_type/{{$prd_tp->id}}">{{$prd_tp->name}}</a></li>
						@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$getNameType}}</h4>

							<div class="beta-products-details">
								<p class="pull-left">{{count($prod_type)}} products</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($prod_type as $prod)
								<div class="col-sm-4" style="margin-bottom: 20px;">
									<div class="single-item">
									@if($prod->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="product_detail/{{$prod->id}}"><img src="source/image/product/{{$prod->image}}" alt="" height="260px" width="265px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$prod->name}}</p>
											<p class="single-item-price">
												@if($prod->promotion_price == 0)
												<span class="flash-sale">{{number_format($prod->unit_price)}}</span>
												@else
												<span class="flash-del">{{number_format($prod->unit_price)}}</span>
												<span class="flash-sale">{{number_format($prod->promotion_price)}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption" style="margin-top: 10px;">
											<a class="add-to-cart pull-left" href="add2cart/{{$prod->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product_detail/{{$prod->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection