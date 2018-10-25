@extends('frontend.index')
@extends('frontend.pages.account.additional')
@section('produck')
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('pembeli.account')}}">My Account</a></li>
            <li class="active">Order History</li>
        </ul>
        @include('frontend.pages.account.alert')
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            @include('frontend.pages.account.sidebar')
            <!-- BEGIN CONTENT -->
            <div id="Profile" class="col-md-9 col-sm-7">
                <h1>Order History</h1>
                <div class="content-page">
                    <div class="row">
                        
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>
@endsection