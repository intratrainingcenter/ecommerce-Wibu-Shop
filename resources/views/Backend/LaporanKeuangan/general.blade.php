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
													<a href="#" onclick="javascript:printlayer('print_lpkeuangan')" class="btn btn-primary btn-3d pull-right"><i class="fa fa-print"></i> Print</a>
												</div>
										</form>
										<div id="print_lpkeuangan" class="col-md-12" style="margin-top:20px;">
											<div class="col-md-12 col-sm-12">	<h2 class="">Laporan Keuangan</h2> </div>
											<div class="responsive-table">
												<table border="0" width="100%">
													<tr>
														<th></th><th><h3>Debit</h3></th><th></th><th></th><th><h3>Credit</h3></th>
													</tr>
													<tr>
														<td>Pembelian</td><td>:</td><td>{{'Rp. '.number_format($Shell->total) }}</td>
														<td>Penjualan</td><td>:</td><td>{{'Rp. '.number_format($Buy->total) }}</td>
													</tr>
														@if ($Shell>$Buy)
															<tr style="color:green;"> <td colspan="5" ><h2>Untung</h2></td> <td><h2></h2></td> </tr>
													@elseif ($Shell<$Buy)
															<tr style="color:red;"> <td colspan="5" ><h2>Rugi</h2></td> <td><h2></h2></td> </tr>
													@else
													@endif
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
