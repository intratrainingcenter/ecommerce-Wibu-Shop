@extends('Backend.Layout.master')
@section('content')
	<div class="content-wrapper">
	  <section class="content-header">
	    <h1>Laporan Keuangan<small>Data Keuangan</small> </h1>
	    <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">User</li></ol>
	  </section>
	  <section class="content">
	    <div class="row">
	      <div class="col-xs-12">
	        <div class="box">
									<div class="panel-body">
										<form action="{{route('FilterLaporanKeuangan')}}">
												<div class="col-lg-4">
													<div class="form-group"  style="width: 100px;">
														<div class="input-group">
															<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
															<input type="datetime-local" class="form-control pull-right" name="dari" >
														</div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group"  style="width: 100px;">
														<div class="input-group">
															<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
															<input type="datetime-local" class="form-control pull-right"  name="sampai" >
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
															<th>kode transaksi</th>
															<th>User</th>
															<th>Tanggal transaksi</th>
															<th>Grand Total</th>
														</tr>
														<tbody>
															@foreach ($Shell as $key => $shell)
															<tr>
																<td>{{$key +1}}</td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															@endforeach
														</tbody>
													</table>
												</div>
											</div>
											<div class="col-md-12 col-sm-12">	<h3 class="">Laporan Transaksi</h3> </div>
											<div class="responsive-table">
												<table class="table table-bordered table-hover" width="100%">
													<tr>
														<th>#</th>
														<th>kode transaksi</th>
														<th>User</th>
														<th>Tanggal transaksi</th>
														<th>Grand Total</th>
													</tr>
													<tbody>
														@foreach ($Buy as $key => $buy)
														<tr>
															<td>{{$key +1}}</td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
	        </div>
	      </div>
	    </div>
	  </section>
</div>
@include('Backend.LaporanKeuangan.additional')
@endsection
