@extends('frontend.index')
@section('produck')
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">My Account</li>
        </ul>
        <div class="row margin-bottom-40">
            @include('frontend.pages.account.sidebar')
            <div class="col-md-9 col-sm-7">
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
                                <td><h3>Name</h3></td><td>:</td><td><h3>{{$user->nama_pembeli}}</h3></td>
                            </tr>
                            <tr>
                                <td><h3>Gender</h3></td><td>:</td><td><h3>{{$user->jenis_kelamin}}</h3></td>
                            </tr>
                            <tr>
                                <td><h3>Email</h3></td><td>:</td><td><h3>{{$user->email}}</h3></td>
                            </tr>
                            <tr>
                                <td><h3>Points</h3></td><td>:</td><td><h3>{{$point}}</h3></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
                <h1>Latest Orders</h1>
                <div class="content-page">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>Code</th>
                            <th>Order at</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @forelse ($orders as $item)
                            <tr onclick="window.location.href = '{{route('show.order', ['code' => $item->kode_keranjang])}}'" title="Click to view details">
                                <td>{{$item->kode_transaksi_penjualan}}</td>
                                <td>{{date('d F Y', strtotime($item->tanggal))}}</td>
                                <td align="right">Rp. {{number_format($item->grand_total)}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" align="center">You don't have any transactions yet!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
