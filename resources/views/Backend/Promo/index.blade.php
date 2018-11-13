@extends('Backend.Layout.master')
@extends('Backend.Promo.additional')

@section('title')
    Promo
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Promo
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Promo</li>
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
                    <div class="alert alert-success alert-dismissible col-md-6 col-md-offset-3" style="position:absolute">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                        <p>{{session('alertsuccess')}}</p> 
                    </div>
                </div>
                @endif
                <div class="box-header">
                    <h3 class="box-title">Data Promo</h3>
                    <button class="btn btn-success pull-right" id="ShowModalAdd">Tambah</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="TablePromo" class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th width="100px">Kode Promo</th>
                        <th>Nama Promo</th>
                        <th>Tanggal Awal</th>
                        <th>Tanggal Akhir</th>
                        <th width="120px">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->kode_promo}}</td>
                                <td>{{$item->nama_promo}}</td>
                                <td>{{date('d F Y', strtotime($item->tanggal_awal))}}</td>
                                <td>{{date('d F Y', strtotime($item->tanggal_akhir))}}</td>
                                <td>
                                    <button class="btn btn-info fa fa-info-circle ModalDetail" title="Rincian" code="{{$item->kode_promo}}"></button>
                                    <button class="btn btn-warning fa fa-pencil ModalEdit" title="Edit" code="{{$item->kode_promo}}"></button>
                                    <button class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#ModalDelete{{$item->kode_promo}}" title="Hapus"></button>
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
  @include('Backend.Promo.modal_add')
  @include('Backend.Promo.modal_detail')
  @include('Backend.Promo.modal_edit')
  @include('Backend.Promo.modal_delete')
@endsection
