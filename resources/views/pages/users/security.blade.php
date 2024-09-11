@extends('master')
@section('content')
<div class="container">
    @if(Auth::check() and Auth::user()->id == $user->id)
    <div class="space40">&nbsp;</div>
    <h4><a href="profile/security/{{Auth::user()->id}}" style="text-decoration:none; font-weight:bold;">Change Password</a></h4>
    <div class="beta-products-details">
        <div class="clearfix"></div>
    </div>
    <div class="row space30">
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" style="color:red; text-align:center;">
                    {{$error}} <i class="fa fa-times"></i>
                </div>
            @endforeach
        @endif
        @if(Session::has('message'))
            <div class="row h5 alert alert-{{Session::get('flag')}}" style="color:{{Session::get('color')}}; text-align:center;">{{Session::get('message')}} <i class="fa fa-{{Session::get('icon')}}"></i></div>
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
                <form action="change_pass/{{$user->id}}" method="get" class="beta-form-checkout">
                    <table class="table " style="width:70%">
                        <tr>
                            <th>Current password</th>
                            <td><input type="password" name="current_pass"></td>
                        </tr>
                        <tr>
                            <th>New password</th>
                            <td><input type="password" name="new_pass"></td>
                        </tr>
                        <tr>
                            <th>Re-password</th>
                            <td><input type="password" name="re_pass"></td>
                        </tr>
                    </table>
                    
                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-pencil" style="color:#fff; font-size:1.1rem;"></i> Save Change</button>
                    
                </form>
            </div>
        </div>

    </div>
    @endif
</div>

@endsection


