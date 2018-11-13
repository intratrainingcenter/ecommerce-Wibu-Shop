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
													<a href="#" onclick="javascript:printlayer('print_lpkeuangan')" class="btn btn-primary btn-3d pull-right"><i class="fa fa-print"></i> Print</a>
												</div>
										</form>
										<div id="print_lpkeuangan" class="col-md-12" style="margin-top:20px;">
												<h2 class="col-md-12 col-sm-12">Laporan Keuangan</h2>
											<div class="responsive-table">
												<table border="0" width="100%">
													<tr>
														<th></th><th><h3>Debit</h3></th><th></th><th><h3>Credit</h3></th>
													</tr>
													<tr>
														<td>Pembelian</td><td> : {{'Rp. '.number_format($Shell) }}</td>
														<td>Penjualan</td><td> : {{'Rp. '.number_format($Buy) }}</td>
													</tr>
														@if ($Shell>$Buy)
															<tr style="color:green;"> <td colspan="5" ><h2>Untung</h2></td> <td><h4></h4></td> </tr>

																<td> <h4 style="color:green">jumlah :<span></span> {{'Rp. '.number_format($Shell-$Buy)}}</h4> </td>

													@elseif ($Shell<$Buy)
															<tr style="color:red;"> <td colspan="5" ><h2>Rugi</h2></td> <td><h2></h2></td> </tr>
															<td> <h4 style="color:red">jumlah :<span></span> {{'Rp. '.number_format($Buy-$Shell)}}</h4> </td>
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
