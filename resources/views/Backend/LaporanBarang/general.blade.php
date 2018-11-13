@extends('Backend.Layout.master')
@section('content')
	<div class="content-wrapper">
	  <section class="content-header">
	    <h1>Laporan Barang<small>Data barang</small> </h1>
	    <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">LaporanTransaksi</li></ol>
	  </section>
	  <section class="content">
	    <div class="row">
	      <div class="col-xs-12">
	        <div class="box">
									<div class="panel-body">
										<form action="{{route('FilterLaporanProduct')}}" >
											<div class="col-lg-2">
												<div class="form-group"  style="width: 100px;">
													<select class="btn btn-3d" name="kode_kategori" id="kategorinya">
															<option value="ada">Semua kategori</option>
														@foreach ($selectcategory as $key)
														<option  value="{{$key->kode_kategori}}">{{$key->nama_kategori}}</option>
														@endforeach
													</select>
												</div>
											</div>
												<div class="col-lg-4">
													<div class="form-group"  style="width: 100px;">
														<div class="input-group">
															<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
															<input type="date" class="form-control pull-right" name="dari" >
														</div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group"  style="width: 100px;">
														<div class="input-group">
															<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
															<input type="date" class="form-control pull-right"  name="sampai" >
														</div>
													</div>
												</div>
												<div class="col-lg-4 right">
													<button class="btn btn-primary btn-3d">Filter</button>
													<a href="#" onclick="javascript:printlayer('print_lpTransaksi')" class="btn btn-primary btn-3d pull-right"><i class="fa fa-print"></i> Print</a>
												</div>
										</form>


										<div id="print_lpTransaksi" class="col-md-12" style="margin-top:20px;">
											<div class="panel">
												<div class="panel-heading">
													<h3>Laporan penjualan</h3>
												</div>
												<div class="responsive-table">
													<table class="table table-bordered table-hover" width="100%">
														<tr>
															<th>#</th>
															<th>kode Product</th>
															<th>nama Product</th>
															<th>Hpp</th>
															<th>Harga Jual</th>
															<th>Masuk</th>
															<th>keluar</th>
															<th>stok Yang tersisa</th>
														</tr>
														<tbody>
												@foreach ($category as $key => $value)
																<tr>
																	<td colspan="9">{{$value->nama_kategori}}</td>
																</tr>
																@php
																	$row = 0;
																	$no = 1;
																	$kode_tt=null;
																	$kode_tt2=null;
																@endphp
																@php($nama = '')
													@foreach ($data as $key => $valuedata)
														@if ($valuedata->kode_kategori == $value->kode_kategori)
															<tr>
																@if($nama == $valuedata->kode_produk) {{-- 3 --}}@else
																	@php($row++)
																	@php($kode_tt=$valuedata->kode_produk)
																	@php($kode_tt2=$valuedata->kode_produk)
																<td >{{$no++}}</td>
																<td >{{$valuedata->kode_produk}}</td>
																<td >{{$valuedata->nama_produk}}</td>
																<td >{{"Rp. ".number_format($valuedata->hpp)}}</td>
																<td >{{"Rp. ".number_format($valuedata->harga)}}</td>
																<td >
																	@if ($Buy->whereIn('kode_produk',[$valuedata->kode_produk])->isNotEmpty())
																		@foreach ($Buy as $key => $valueBuy)
																			@if ($valueBuy->kode_produk == $valuedata->kode_produk)
																				{{$valueBuy->masuk}}
																			@endif
																		@endforeach
																	@else -
																	@endif
																</td>
																<td >
																	@if ($Shell->whereIn('kode_produk',[$valuedata->kode_produk])->isNotEmpty())
																		@foreach ($Shell as $key => $valueShell)
																			@if ($valueShell->kode_produk == $valuedata->kode_produk)
																				{{$valueShell->keluar}}
																			@endif
																		@endforeach
																	@else -
																	@endif
																</td>
																<td >{{$valuedata->stock}}</td>
															</tr>
																@endif
																@endif
													@endforeach
												@endforeach
														</tbody>
													</table>
												</div>
											</div>
											</div>
									</div>
	        </div>
	      </div>
	    </div>
	  </section>
</div>
@include('Backend.LaporanBarang.additional')
@endsection
