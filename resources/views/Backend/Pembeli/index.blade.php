@extends('Backend.Layout.master')
@extends('Backend.Pembeli.additional')

@section('title')
    Pembeli
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pembeli
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pembeli</li>
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
                    <h3 class="box-title">Data Pembeli</h3>
                    <a href="{{route('pembeli.nonAktive')}}"><button class="btn btn-info pull-right">Data Deleted</button></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="TablePembeli" class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th>Kode Pembeli</th>
                        <th>Nama Pembeli</th>
                        <th>Email</th>
                        <th width="56px">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->kode_pembeli}}</td>
                                <td>{{$item->nama_pembeli}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <button class="btn btn-info fa fa-info-circle" data-toggle="modal" data-target="#ModalDetail{{$item->kode_pembeli}}" title="Rincian"></button>
                                    <button class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#ModalDelete{{$item->kode_pembeli}}" title="Hapus"></button>
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
  @include('Backend.Pembeli.modal_detail')
  @include('Backend.Pembeli.modal_delete')
@endsection
