@extends('frontend.pages.auth.master')
@section('content')
<ul class="breadcrumb">
    <li><a href="index.html">Home</a></li>
    <li class="active">My Account</li>
</ul>

<!-- BEGIN SIDEBAR & CONTENT -->
<div class="row margin-bottom-40">
    <!-- BEGIN SIDEBAR -->
    <div class="sidebar col-md-3 col-sm-3">
        <ul class="list-group margin-bottom-25 sidebar-menu">
        <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Edit account information</a></li>
        <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Address book</a></li>
        <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> View your order history</a></li>
        <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Your Reward Points</a></li>
        <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Your Transactions</a></li>
        </ul>
    </div>
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="col-md-9 col-sm-7">
        <h1>My Account</h1>
        <div class="content-page">
            <center>
                @if ($user->foto == '')
                <img src="{{asset('images/foto.png')}}" alt="">
                @else
                <img src="{{Storage::url($user->foto)}}" alt="">
                @endif
            </center>
            <table width="100%">
                <thead>
                    <th width="30%"></th><th width="5%"></th><th width="60%"></th>
                </thead>
                <tbody>
                    <tr>
                        <td><h3>Nama</h3></td><td>:</td><td><h3>{{$user->nama_pembeli}}</h3></td>
                    </tr>
                    <tr>
                        <td><h3>Jenis Kelamin</h3></td><td>:</td><td><h3>{{$user->jenis_kelamin}}</h3></td>
                    </tr>
                    <tr>
                        <td><h3>Alamat</h3></td><td>:</td><td><h3>{{$user->alamat}}</h3></td>
                    </tr>
                    <tr>
                        <td><h3>Email</h3></td><td>:</td><td><h3>{{$user->email}}</h3></td>
                    </tr>
                    <tr>
                        <td><h3>Poin</h3></td><td>:</td><td><h3></h3></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END SIDEBAR & CONTENT -->
@endsection