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
        @if (session('alertSuccessPassword'))
        <div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6 berhasiltambah">
			<div class="alert alert-success alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>{{session('alertSuccessPassword')}}</strong>
			</div>
        </div>
        @elseif(session('alertFailProfile'))
        <div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6 berhasiltambah">
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>{{session('alertFailProfile')}}</strong>
			</div>
        </div>
        @elseif(session('alertSuccessProfile'))
        <div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6 berhasiltambah">
			<div class="alert alert-success alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<strong>{{session('alertSuccessProfile')}}</strong>
			</div>
        </div>
        @endif

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            @include('frontend.pages.account.sidebar')
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
                            @if ($user->telepon == '')
                                <h3>You haven't add your phone number yet</h3>
                            @else
                                <h3>{{$user->telepon}}</h3>
                            @endif
                        </div>
                    <div class="row">
                        <button id="EditProfile" class="btn btn-primary pull-right" style="margin:10px">Edit Profile</button>
                        <a href="{{route('account.password')}}" class="btn btn-primary pull-right" style="margin:10px; color:white">Change Password</a>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>
@endsection