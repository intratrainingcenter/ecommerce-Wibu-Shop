@extends('frontend.index')
@extends('frontend.pages.account.additional')
@section('produck')
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('pembeli.account')}}">My Account</a></li>
            <li class="active">Address</li>
        </ul>
        @include('frontend.pages.account.alert')
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            @include('frontend.pages.account.sidebar')
            @include('frontend.pages.account.edit_address')
            <!-- BEGIN CONTENT -->
            <div id="DetailAddress" class="col-md-9 col-sm-7">
                <h1>Detail Address</h1>
                <div class="content-page">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for=""> Province</label>
                            <h3>{{$address->provinsi}}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for=""> City</label>
                            <h3>{{$address->kota}}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Address</label>
                            <h3>{{$address->alamat}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-success pull-right" id="EditAddress" style="margin:10px">Edit</button>
                        <a href="{{route('account.address')}}" class="btn btn-danger pull-right" style="margin:10px;color:white">Back</a>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>
@endsection

