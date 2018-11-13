@extends('Backend.Layout.master')
@extends('Backend.Kategori.additional')
@section('title')  Kategori Produk @endsection
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Kategori Produk<small>Control panel</small></h1><ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li><li class="active">Kategori Produk</li></ol>
  </section>
  <section class="content">
    <div class="row">
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
          <h3 class="box-title"></h3>
          <div class="box-tools">
            <a class="btn btn-success fa fa-plus" title="simpan" data-toggle="modal" data-target="#TambahKategori" style="float:right;" href="#"></a>
          </div>
        </div>
        <div class="box-body">
          <table id="TableKategoriProduk"  class="table table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $index => $item)
              <tr>
                <td>{{$index+1}}</td>
                <td>{{$item->kode_kategori}}</td>
                <td>{{$item->nama_kategori}}</td>
                <td>{{$item->keterangan}}</td>
                <td>
                  <a type="button" class="btn btn-warning fa fa-pencil" data-toggle="modal" title="edit" data-target="#EditKategori{{$item->kode_kategori}}" href="#"></a>
                  <a type="button" class="btn btn-danger fa  fa-trash" data-toggle="modal" title="hapus" data-target="#HapusKategori{{$item->kode_kategori}}"></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  @include('Backend.Kategori.add')
  @include('Backend.Kategori.edit')
  @include('Backend.Kategori.delete')
@endsection
