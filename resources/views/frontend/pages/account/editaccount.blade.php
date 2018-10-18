@extends('frontend.index')
@extends('frontend.pages.account.additional')
@section('produck')
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('pembeli.account')}}">My Account</a></li>
            <li class="active">Profile</li>
        </ul>

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-3">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                <li class="list-group-item clearfix"><a href="{{route('account.edit')}}"><i class="fa fa-angle-right"></i> My Profile</a></li>
                <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Address</a></li>
                <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> My Order</a></li>
                <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Order History</a></li>
                </ul>
            </div>
            <!-- END SIDEBAR -->
        
            <!-- BEGIN CONTENT -->
            @include('frontend.pages.account.edit_form')
            <div id="Profile" class="col-md-9 col-sm-7">
                <h1>My Profile</h1>
                <div class="content-page">
                        <div class="col-md-4">
                            @if ($user->foto == '')
                            <img src="{{asset('images/foto.png')}}" alt="">
                            @else
                            <img src="{{Storage::url($user->foto)}}" class="img-responsive" alt="">
                            @endif
                        </div>
                        <div class="col-md-4">
                            Name
                            <h3>{{$user->nama_pembeli}}</h3>
                        </div>
                        <div class="col-md-4">
                            Gender
                            @if ($user->jenis_kelamin == 'Laki-laki')
                                <h3>Male</h3>
                            @else
                                <h3>Female</h3>
                            @endif
                        </div>
                        <div class="col-md-4">
                            Email
                            <h3>{{$user->email}}</h3>
                        </div>
                        <div class="col-md-4">
                            Phone Number
                            <h3>{{$user->telepon}}</h3>
                        </div>
                    <div class="row">
                        <button id="EditProfile" class="btn btn-primary pull-right" style="margin:10px">Edit Profile</button>
                        <button id="ChangePassword" class="btn btn-primary pull-right" style="margin:10px">Change Password</button>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>
@endsection