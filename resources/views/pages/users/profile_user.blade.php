@extends('master')
@section('content')
<div class="container">
    @if(Auth::check() and Auth::user()->id == $user->id)
    <div class="space40">&nbsp;</div>
    <h4><a href="profile/{{Auth::user()->id}}" style="text-decoration:none; font-weight:bold;">General account settings</a></h4>
    <div class="beta-products-details">
        <div class="clearfix"></div>
    </div>
    <div class="row space30">
        @if(Session::has('message'))
            <div class="row h5 alert alert-success" style="color:green; text-align:center;">{{Session::get('message')}} <i class="fa fa-check"></i></div>
        @endif
    </div>
    <div class="space10">&nbsp;</div>
    <div class="content">
        <div class="row">
            <div class="col-sm-3">
                <ul class="aside-menu">
                    <li><a href="profile/{{Auth::user()->id}}">General</a></li>
                    <li><a href="profile/security/{{Auth::user()->id}}">Security</a></li>
                    @if(Auth::user()->role == 1)
                    <li><a href="list_product">Products</a></li>
                    <li><a href="list_bills">Bills</a></li>
                    @endif
                </ul>
            </div>
            <div class="col-cm-9">
                <form action="update_profile/{{$user->id}}" method="get" class="beta-form-checkout">
                    <table class="table " style="width:70%">
                        <tr>
                            <th>Name</th>
                            <td><input type="text" name="full_name" value="{{$user->full_name}}"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input type="text" name="email" value="{{$user->email}}"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><input type="text" name="address" value="{{$user->address}}"></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><input type="text" name="phone" value="{{$user->phone}}"></td>
                        </tr>
                    </table>
                    
                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-pencil" style="color:#fff; font-size:1.1rem;"></i> Save</button>
                    
                </form>
            </div>
        </div>

    </div>
    @endif
</div>

@endsection


