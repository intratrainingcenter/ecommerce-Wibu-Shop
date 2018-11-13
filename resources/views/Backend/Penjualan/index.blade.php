@extends('Backend.Layout.master')
@extends('Backend.Penjualan.additional')
@section('title') Penjualan @endsection
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Penjualan<small>Control panel</small></h1><ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Penjualan</li></ol>
    </section>
    <section class="content">
      <div class="row">
          <div class="col-xs-12">
            <div class="box">
                @if (session('alertfail'))
                <div class="col-md-12 MyAlert">
                    <div class="alert alert-danger alert-dismissible col-md-6 col-md-offset-3" style="position:absolute">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Gagal!</h4><p>{{session('alertfail')}}</p>
                    </div>
                </div>
                @elseif(session('alertsuccess'))
                <div class="col-md-12 MyAlert">
                    <div class="alert alert-danger alert-dismissible col-md-6 col-md-offset-3" style="position:absolute">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Berhasil!</h4><p>{{session('alertsuccess')}}</p>
                    </div>
                </div>
                @endif
                <div class="box-header">
                    <h3 class="box-title">Data Penjualan</h3><button class="btn btn-success pull-right" data-toggle="modal" data-target="#ModalAdd">Tambah</button>
                </div>
                <div class="box-body">
                    <table id="TablePenjualan" class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th>Kode Penjualan</th>
                        <th>Pembeli</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->kode_transaksi_penjualan}}</td>
                                <td>{{$item->GetBuyer->nama_pembeli}}</td>
                                <td>{{date('d F Y', (strtotime($item->tanggal)))}}</td>
                                <td align="right">Rp. {{number_format($item->grand_total,0,"",".")}}</td>
                                <td>{{$item->status}}</td>
                                <td>
                                    <a href="{{route('penjualan.show', ['code' => $item->kode_keranjang])}}" class="btn btn-info fa fa-info-circle" title="Rincian"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection
