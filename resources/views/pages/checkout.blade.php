@extends('master')
@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index">Home</a> / <span>Check Out</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		@if(Session::has('announcement'))
			@if(Session::get('announcement') == 1)
				<div class="row h5" style="color:green; text-align:center;">Order completed <i class="fa fa-check"></i></div>
			@else
				<div class="row h5" style="color:red; text-align:center;">Your cart is empty <i class="fa fa-times"></i></div>
			@endif
		@endif
		<div id="content">
			<form action="order" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				@csrf <!-- {{ csrf_field() }} -->
				<div class="row">
                    <h3 class="text-center">Check Out</h3>
                    <div class="space50">&nbsp;</div>

					<div class="col-sm-6">
						<div class="form-block">
							<label for="name">Full Name*</label>
							<input type="text" id="name" name="name" placeholder="Full Name" value="@if(Auth::check()) {{Auth::user()->full_name}} @endif" required>
						</div>
						<div class="form-block">
							<label>Gender </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="male" checked="checked" style="width: 5%"><span style="margin-right: 5%">Male</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="female" style="width: 5%"><span style="margin-right: 5%">Female</span>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="other" style="width: 5%"><span style="margin-right: 5%">Other</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" placeholder="expample@gmail.com" value="@if(Auth::check()) {{Auth::user()->email}} @endif" required>
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" id="adress" name="address" placeholder="Street Address" value="@if(Auth::check()) {{Auth::user()->address}} @endif" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone" name="phone_number" value="@if(Auth::check()) {{Auth::user()->phone}} @endif" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Note</label>
							<textarea id="notes" name="note"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Your Cart</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
                                    @if(Session::has('cart'))
                                    @foreach($product_in_cart as $product)
                                        <div class="media">
                                            <div class="remove-item pull-right" >
                                                <a href="remove_item/{{$product['item']['id']}}"><i class="fa fa-times color-gray" style="font-size: 16px;"></i></a>
                                            </div>
                                            <img width="20%" src="source/image/product/{{$product['item']['image']}}" alt="" class="pull-left">
                                            <div class="media-body">
                                                <h5 >{{$product['item']['name']}}</h5>
                                                <span class="color-gray your-order-info">Price: <span>{{number_format($product['price'])}}</span></span>
                                                <div class="quantity-container" style="width:80px;margin-top: 4px;">
													<div class="quantity-section">
														<a href="reduce_item/{{$product['item']['id']}}" class="change qty-minus">-</a>
														<span class="qty-number">{{$product['qty']}}</span>
														<a href="add2cart/{{$product['item']['id']}}" class="change qty-add">+</a>
													</div>
												</div>
                                            </div>
                                        </div>
                                        <hr style="width:100%;">
                                    @endforeach
                                    @endif
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Total Amount:</p></div>
									<div class="pull-right"><h5 class="color-black" style="color: crimson;font-weight: bold;">@if(Session::has('cart')) {{number_format(Session('cart')->totalPrice)}} @else 0 @endif  </h5><p class="color-black pull-right">VND</p></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Payment Method</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Cash On Delivery (COD) </label>
									</li>

									<!-- <li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li> -->
									
								</ul>
							</div>

							<div class="text-center"><button class="beta-btn primary">Order <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection