@extends('Backend.Layout.master')
@extends('Backend.pembelianProduct.additional')

@section('title')
    Pembelian Produk
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pembelian Produk
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
              @include('Backend.pembelianProduct.alert')
                <div class="box-header">
                    <h3 class="box-title">Data Produk</h3>
                    <a href="{{route('addproduct')}}"> <button class="btn btn-success pull-right">Tambah</button></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="TableTransBeli" class="table table-bordered table-hover" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                        <th width="20px">No</th>
                        <th>Kode Transaksi</th>
                        <th>Pengaju</th>
                        <th>Sub Total</th>
                        <th>Tanggal</th>
                        <th width="150px">Status/Opsi</th>
                      </tr>
                      </thead>
                      <tbody>
                        @if (auth::user()->jabatan == 'Spv')
                          @include('Backend.pembelianProduct.tbl_rows_Spv')
                        @elseif (auth::user()->jabatan == 'Owner')
                          @include('Backend.pembelianProduct.tbl_rows_Owner')
                        @endif
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
  @include('Backend.pembelianProduct.modal.modal_detail_user')
  @include('Backend.pembelianProduct.modal.modal_cancel')
  @include('Backend.pembelianProduct.modal.modal_stat')
  @include('Backend.pembelianProduct.modal.modal_detail')
  @include('Backend.pembelianProduct.modal.modal_acc')

@endsection
