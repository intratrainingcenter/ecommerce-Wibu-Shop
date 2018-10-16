@extends('frontend.pages.auth.master')
@section('content')
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">My Account</li>
        </ul>

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-3">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Sunting Akun</a></li>
                <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Alamat</a></li>
                <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Pesanan Saya</a></li>
                <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Riwayat Pesanan</a></li>
                <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Poin Saya</a></li>
                </ul>
            </div>
            <!-- END SIDEBAR -->
        
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
                <h1>Akun Saya</h1>
                <div class="content-page">
                    <center>
                        @if ($user->foto == '')
                        <img src="{{asset('images/foto.png')}}" alt="">
                        @else
                        <img src="{{Storage::url($user->foto)}}" width="250px" alt="">
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
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
                <h1>Pesanan Terakhir</h1>
                <div class="content-page">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>Kode Pesanan</th>
                            <th>Dipesan pada</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>


@endsection