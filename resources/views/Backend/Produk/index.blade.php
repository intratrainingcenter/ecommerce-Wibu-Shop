@extends('Backend.Layout.master')
@extends('Backend.Produk.additional')

@section('title')
    Produk
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Produk
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Produk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
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
                    <div class="alert alert-danger alert-dismissible col-md-6 col-md-offset-3" style="position:absolute">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                        <p>{{session('alertsuccess')}}</p> 
                    </div>
                </div>
                @endif
                <div class="box-header">
                    <h3 class="box-title">Data Produk</h3>
                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#ModalAdd">Tambah</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="TableProduk" class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th width="100px">Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th width="50px">Stok</th>
                        <th>Harga Jual</th>
                        <th>Status</th>
                        <th width="120px">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->kode_produk}}</td>
                                <td>{{$item->nama_produk}}</td>
                                <td>{{$item->GetKategori->nama_kategori}}</td>
                                <td align="right">{{$item->stok}}</td>
                                <td align="right">{{number_format($item->harga,0,"",".")}}</td>
                                <td>{{$item->status}}</td>
                                <td>
                                    <button class="btn btn-info fa fa-info-circle" data-toggle="modal" data-target="#ModalDetail{{$item->kode_produk}}" title="Rincian"></button>
                                    <button class="btn btn-warning fa fa-pencil" data-toggle="modal" data-target="#ModalEdit{{$item->kode_produk}}" title="Ubah"></button>
                                    <button class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#ModalDelete{{$item->kode_produk}}" title="Hapus"></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('Backend.Produk.modal_add')
  @include('Backend.Produk.modal_detail')
  @include('Backend.Produk.modal_edit')
  @include('Backend.Produk.modal_delete')
@endsection
