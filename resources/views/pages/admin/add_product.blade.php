@extends('master')
@section('content')


@if(Auth::check() and Auth::user()->role == 1)
<div class="container">
    <div id="content">
			<form action="add_prod" method="get" class="beta-form-checkout">
				<!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<h4 style="text-align:center;">Add product</h4>
						<div class="space20">&nbsp;</div>
						
						<div class="form-block">
							<label for="name">Name*</label>
							<input type="text" id="name" name="name" placeholder="Name of product" required>
						</div>

						<div class="form-block">
							<label for="type">Type*</label>
                            <select class="wc-select" id="type" name="type" required>
                                <option hidden>Type</option>
                                <option value="1">T-Shirt</option>
                                <option value="2">Polo</option>
                                <option value="3">Hoodie</option>
                                <option value="4">Sweater</option>
                                <option value="5">Jacket</option>
                                <option value="6">Jeans</option>
                                <option value="7">Short</option>
                            </select>
						</div>

                        <div class="form-block">
							<label for="description">Description</label>
							<textarea id="description" name="description"></textarea>
						</div>

						<div class="form-block">
							<label for="price">Price*</label>
							<input type="text" id="price" name="price" placeholder="Price of an unit" required>
						</div>

                        <div class="form-block">
							<label for="promote">Promoted*</label>
							<input type="text" id="promote" name="promote" placeholder="Promotion price" required>
						</div>

                        <div class="form-block">
							<label for="image">Image*</label>
							<input type="text" id="image" name="image" placeholder="Name of image" required>
						</div>

                        <div class="form-block">
                            <label for="new">New</label>
							<input id="new" type="radio" class="input-radio" name="new" value="1" checked="checked" style="width: 5%"><span style="margin-right: 5%">Yes</span>
							<input id="new" type="radio" class="input-radio" name="new" value="0" style="width: 5%"><span style="margin-right: 5%">No</span>
						</div>


						<div class="form-block" style="margin-right:10%;">
							<button type="submit" class="btn btn-success pull-right"><i class="fa fa-plus" style="color:#fff; font-size:1.1rem;"></i> Add</button>
						</div>
					</div>
					<div class="col-sm-2"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endif

@endsection