@extends('Backend.Layout.master')
@section('title')  Dashboard @endsection
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Dashboard<small>Control panel</small></h1><ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Dashboard</li></ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner"><p>Jumlah Pembeli</p><h3> <span >{{count($buyer)}}</span></h3></div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="{{route('frontend.pembeli')}}" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner"><p>Jumlah Produk</p><h3> <span >{{count($product)}}</span></h3></div>
            <div class="icon">
              <i class="fa fa-th"></i>
            </div>
            <a href="{{route('produk.index')}}" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner"><p>Transaksi Hari ini</p><h3> <span >{{count($transaction)}}</span></h3></div>
            <div class="icon"><i class="ion ion-pie-graph"></i></div>
            <a href="{{route('penjualan.index')}}" class="small-box-footer">Info Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
    </section>
  </div>
@endsection
