@extends('master')
@section('content')

@if(Auth::check() and Auth::user()->role == 1)
<div class="container">
    <div class="row">
        <div class="col-sm-3" style="margin-top: 35px;">
            <ul class="aside-menu">
                <li><a href="profile/{{Auth::user()->id}}">General</a></li>
                <li><a href="profile/security/{{Auth::user()->id}}">Security</a></li>
                @if(Auth::user()->role == 1)
                <li><a href="list_product">Products</a></li>
                <li><a href="list_bills">Bills</a></li>
                @endif
            </ul>
        </div>
        <div>
            <div class="space40">&nbsp;</div>
            <h4><a href="list_product" style="text-decoration:none;">List of Products</a></h4>
            <div class="beta-products-details">
                <p class="pull-left">{{count($products)}} products</p>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    
    <div class="row space50">
        @if(Session::has('message'))
            <div class="row h5 alert alert-success" style="color:green; text-align:center;">{{Session::get('message')}} <i class="fa fa-check"></i></div>
        @endif
    </div>
    <div class="space10">&nbsp;</div>
    <div class="beta-comp pull-right">
        <form role="search" method="get" id="searchform" action="search_list">
            <input type="text" value="" name="search_list" id="search" placeholder="Search in list..." />
            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
        </form>
    </div>
    <div class="content">
        <table class="table table-bordered">
            <tr class="success">
                <th>ID</th>
                <th>Name</th>
                <th>Price (VND)</th>
                <th>Description</th>
                <th>Image</th>
                <th>Edit</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="add_product"><button type="submit" class="btn btn-success"><i class="fa fa-plus" style="color:#fff; font-size:1.1rem;"></i> Add</button></a>
                    <div class="space20">&nbsp;</div>
                </td>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                @if($product->promotion_price == 0)
                <td class="text-right flash-sale">{{number_format($product->unit_price)}}</td>
                @else
                <td class="text-right"> 
                    <p class="flash-del">{{number_format($product->unit_price)}}</p>
                    <p class="flash-sale">{{number_format($product->promotion_price)}}</p>
                </td>
                @endif
                <td>{{$product->description}}</td>
                <td>
                    <img src="source/image/product/{{$product->image}}" alt="" width="120" height="115">
                </td>
                <td>
                    <a href="edit_product/{{$product->id}}">
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"> Edit</span></button>
                    </a> 
                    <br> <br>
                    <a href="delete_prod/{{$product->id}}">
                        <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> Delete</span></button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        
    </div>
</div>
@endif

@endsection


