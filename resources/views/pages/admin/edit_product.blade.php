@extends('master')
@section('content')


@if(Auth::check() and Auth::user()->role == 1)
<div class="container">
    <div id="content">
			<form action="update_prod/{{$product[0]->id}}" method="get" class="beta-form-checkout">
				<!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<h4 style="text-align:center;">Edit product</h4>
						<div class="space20">&nbsp;</div>
						
						<div class="form-block">
							<label for="name">Name*</label>
							<input type="text" id="name" name="name" placeholder="Name of product" value="{{$product[0]->name}}" required>
						</div>

						<div class="form-block">
							<label for="type">Type*</label>
                            <select class="wc-select" id="type" name="type" value="{{$product[0]->id_type}}" required>
                                <option hidden>Type</option>
                                @foreach($type_name as $type)
                                <option value="{{$type->id}}" @if($type->id == $product[0]->id_type) selected @endif>{{$type->name}}</option>
                                @endforeach
                            </select>
						</div>

                        <div class="form-block">
							<label for="description">Description</label>
							<textarea id="description" name="description">{{$product[0]->description}}</textarea>
						</div>

						<div class="form-block">
							<label for="price">Price*</label>
							<input type="text" id="price" name="price" placeholder="Price of an unit" value="{{$product[0]->unit_price}}" required>
						</div>

                        <div class="form-block">
							<label for="promote">Promoted*</label>
							<input type="text" id="promote" name="promote" placeholder="Promotion price" value="{{$product[0]->promotion_price}}" required>
						</div>

                        <div class="form-block">
							<label for="image">Image*</label>
							<input type="text" id="image" name="image" placeholder="Name of image" value="{{$product[0]->image}}" required>
						</div>

                        <div class="form-block">
                            <label for="new">New</label>
							<input id="new" type="radio" class="input-radio" name="new" value="1" @if($product[0]->new == 1) checked @endif style="width: 5%"><span style="margin-right: 5%">Yes</span>
                            <input id="new" type="radio" class="input-radio" name="new" value="0" @if($product[0]->new == 0) checked @endif style="width: 5%"><span style="margin-right: 5%">No</span>
                            
						</div>


						<div class="form-block" style="margin-right:10%;">
							<button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-pencil"> Save</span></button>
						</div>
					</div>
					<div class="col-sm-2"></div>
				</div>
			</form>
		</div> <!-- #content -->
</div> <!-- .container -->
@endif

@endsection