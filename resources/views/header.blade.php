
<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> No.19, Nguyen Huu Tho St, Distric 7, Ho Chi Minh City</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0999 999 999</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
						<li><a href="profile/{{Auth::user()->id}}"><i class="fa fa-user"></i> {{Auth::user()->full_name}}</a></li>
						<li><a href="logout">Log Out</a></li>
						@else
						<li><a href="signup">Sign Up</a></li>
						<li><a href="login">Log In</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index" id="logo"><img src="source/assets/dest/images/logo/logo3.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="search">
					        <input type="text" value="" name="search" id="search" placeholder="Search..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Cart (@if(Session::has('cart')){{Session('cart')->totalQty}}@else 0 @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@if(Session::has('cart'))
								@foreach($product_cart as $product)
								<div class="cart-item">
									<div class="remove-item pull-right" >
										<a href="remove_item/{{$product['item']['id']}}"><i class="fa fa-times color-gray" style="font-size: 16px;"></i></a>
									</div>
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title" style="font-size: 1.1rem;">{{$product['item']['name']}}</span>
											<span class="color-gray cart-item-amount">Price: <span style="color: crimson;font-weight: bold;">{{number_format($product['price'])}}</span></span>
											<div class="quantity-container">
												<div class="quantity-section">
													<a href="reduce_item/{{$product['item']['id']}}" class="change qty-minus">-</a>
													<span class="qty-number">{{$product['qty']}}</span>
													<a href="add2cart/{{$product['item']['id']}}" class="change qty-add">+</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
								@endif
								<div class="cart-caption">
									<div class="cart-total text-right">Total: <span class="cart-total-value" style="color: crimson;font-weight: bold;">@if(Session::has('cart')) {{number_format(Session('cart')->totalPrice)}} @else 0 @endif</span></div>
									<div class="clearfix"></div>
									@if(Session::has('cart'))
									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="check_out" class="beta-btn primary text-center">Purchase <i class="fa fa-chevron-right"></i></a>
									</div>
									@endif
								</div>
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #001219;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="index">Home</a></li>
						<li><a href="product_type/0">Products</a>
							<ul class="sub-menu">
								@foreach($prd_types as $prd_tp)
								<li><a href="product_type/{{$prd_tp->id}}">{{$prd_tp->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="about_us">About</a></li>
						<li><a href="contact">Contact</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->


	