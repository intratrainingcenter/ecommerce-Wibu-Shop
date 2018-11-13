@extends('frontend.index')
@extends('frontend.pages.account.additional')
@section('produck')
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('pembeli.account')}}">My Account</a></li>
            <li class="active">My Order</li>
        </ul>
        @include('frontend.pages.account.alert')
        <div class="row margin-bottom-40">
            @include('frontend.pages.account.sidebar')
            <div id="Profile" class="col-md-9 col-sm-7">
                <h1>My Order</h1>
                <div class="content-page">
                    <div class="row">
                        <div class="col-md-12">
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
    </div>
</div>
@endsection
