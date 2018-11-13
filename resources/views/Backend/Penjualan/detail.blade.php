@extends('Backend.Layout.master')
@extends('Backend.Penjualan.additional')
@section('title')  Pesanan {{$Penjualan->kode_transaksi_penjualan}} @endsection
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Pesanan {{$Penjualan->kode_transaksi_penjualan}}<small>Control panel</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Penjualan</li>
        <li class="active">{{$Penjualan->kode_transaksi_penjualan}}</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
          <div class="col-xs-12">
            <div class="box">
                @if (session('alertfail'))
                <div class="col-md-12 MyAlert">
                    <div class="alert alert-danger alert-dismissible col-md-6 col-md-offset-3" style="position:absolute">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                        <p>{{session('alertfail')}}</p>
                    </div>
                </div>
                @elseif(session('alertsuccess'))
                <div class="col-md-12 MyAlert">
                    <div class="alert alert-success alert-dismissible col-md-6 col-md-offset-3" style="position:absolute">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                        <p>{{session('alertsuccess')}}</p>
                    </div>
                </div>
                @endif
                <div class="box-header">
                    <h3 class="box-title">{{$Penjualan->kode_transaksi_penjualan}}</h3><br>
                    @if ($Penjualan->status == 'Order')
                        <h3 class="box-title"> Status : Belum Bayar</h3>
                    @elseif($Penjualan->status == 'Paid')
                        <h3 class="box-title"> Status : Sudah Bayar</h3>
                    @elseif($Penjualan->status == 'Sent')
                        <h3 class="box-title"> Status : Sudah Dikirim</h3>
                    @elseif($Penjualan->status == 'Recieved')
                        <h3 class="box-title"> Status : Sudah Diterima</h3>
                    @else
                        <h3 class="box-title"> Status : {{$Penjualan->status}}</h3>
                    @endif
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th>Produk</th>
                        <th width="100px">Jumlah</th>
                        <th width="200px">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($Products as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{Storage::url($item->detailProduct->foto)}}" alt="{{$item->detailProduct->nama_produk}}" height="150px"> {{ $item->detailProduct->nama_produk}}</td>
                                <td align="right">{{$item->jumlah}}</td>
                                <td align="right">Rp. {{number_format($item->sub_total,0,"",".")}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td><strong>Grand Total</strong></td>
                            <td align="right"><strong>Rp. {{number_format($SUM,0,"",".")}}</strong></td>
                        </tr>
                    </tfoot>
                    </table>
                    @if($Penjualan->status == 'Paid')
                        <form action="{{route('penjualan.update', ['code' => $Penjualan->kode_keranjang])}}" method="post">
                        @csrf @method('PATCH')
                        <input type="hidden" name="type" value="Sent">
                        <button type="submit" class="btn btn-success pull-right">Kirim Pesanan</button>
                    @elseif($Penjualan->status == 'Sent')
                        <form action="{{route('penjualan.update', ['code' => $Penjualan->kode_keranjang])}}" method="post">
                        @csrf @method('PATCH')
                        <input type="hidden" name="type" value="Recieved">
                        <button type="submit" class="btn btn-success pull-right">Pesanan Diterima</button>
                    @else
                    @endif
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection
