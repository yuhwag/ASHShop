@extends('master')
@section('content')

@if(Auth::check() and Auth::user()->role == 1)
<div class="container">
    <!-- <div class="row space50"> -->
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
            <h4><a href="bill_product" style="text-decoration:none;">{{$view_bill}} Bills</a></h4>
            <div class="beta-products-details">
                <p class="pull-left">{{count($bills)}} bills</p>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row space50">
        @if(Session::has('message'))
            <div class="row h5 alert alert-success" style="color:green; text-align:center;">{{Session::get('message')}} <i class="fa fa-check"></i></div>
        @endif
    </div>
    <!-- <div class="space10">&nbsp;</div> -->

    <div class="beta-comp pull-right">
        <form action="list_bills" method="get">
            <select name="view_bills" id="view_bills" onchange="this.form.submit()">
                <option>-- Choose --</option>
                <option value="All">All</option>
                <option value="New">New</option>
                <option value="Checked">Checked</option>
            </select>
        </form>
    </div>

    <div class="content">
        <table class="table table-bordered">
            <tr class="success">
                <th>Bill ID</th>
                <th>Customer</th>
                <th>Products</th>
                <th>Note</th>
                <th>Date</th>
                <th>Total (VND)</th>
                <th>PM</th>
                <th>Status</th>
            </tr>
            
            @foreach($bills as $bill)
            <tr>
                <td>{{$bill->id}}</td>

                <td>
                @foreach($customers as $customer)
                    @if ($customer->id == $bill->id_customer)
                    <span style="font-weight: bold;">Name:</span> {{$customer->name}} <br>
                    <span style="font-weight: bold;">Email:</span> {{$customer->email}} <br>
                    <span style="font-weight: bold;">Address:</span> {{$customer->address}} <br>
                    <span style="font-weight: bold;">Phone:</span> {{$customer->phone_number}}
                    @endif
                @endforeach
                </td>
                    
                <td>
                @foreach($bill_dt as $billDT)
                    @if ($billDT->id_bill == $bill->id)
                        @foreach($products as $product)
                            @if ($product->id == $billDT->id_product)
                            <div class="media">
                                <img src="source/image/product/{{$product->image}}" alt="" class="pull-left" style="width:4.5rem">
                                <div class="media-body">
                                    <h6>{{$product->name}}</h6>
                                    <span class="color-gray">Price: <span style="font-weight: bold;">{{number_format($billDT->unit_price)}}</span></span> 
                                    <span class="color-gray pull-right">Quantity: <span style="font-weight: bold;">{{$billDT->quantity}}</span></span>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                </td>
                
                <td>{{$bill->note}}</td>

                <td>{{$bill->date_order}}</td>
                
                <td style="color: crimson; font-weight: bold;">{{number_format($bill->total)}}</td>

                <td>{{$bill->payment}}</td>

                <td>
                    @if($bill->new == 1)
                    <a href="checked_bill/{{$bill->id}}">
                        <button type="button" class="btn btn-primary pull-right"> Check <span class="fa fa-check"></span></button>
                    </a>
                    @else
                    <span class="text-success pull-right" style="font-weight: bold;">Done <i class="fa fa-check"></i></span> 
                    @endif
                </td>
                
            </tr>
            @endforeach
        </table>
        
    </div>
</div>
@endif

@endsection


