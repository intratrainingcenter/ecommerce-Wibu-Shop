@extends('backend.master')
@extends('backend.formenu')
@extends('backend.lp_keuangan.additional')

@section('konten')
<div class="panel">
	<div class="panel-body">
		<div class="col-xm-12">
			<h3>Laporan Keuangan
			<a href="#" onclick="javascript:printlayer('print_lpkeuangan')" class="btn btn-primary btn-3d pull-right"><i class="fa fa-print"></i> Print</a>
		</h3>
		</div>
	</div>
</div>

<div class="col-md-12 top-20 padding-0">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-body">
				<form action="{{route('Laporan_keuangan.filter')}}">
				    <div class="row">
				      <div class="col-lg-4">
				          <div class="form-group"  style="width: 100px;">
				              <div class="input-group">
				                <div class="input-group-addon">
				                  <i class="fa fa-calendar"></i>
				                </div>
				                <input type="datetime-local" class="form-control pull-right" name="dari" >
				              </div>
				            </div>
				      </div>
				      <div class="col-lg-4">
				      <div class="form-group"  style="width: 100px;">
				        <div class="input-group">
				          <div class="input-group-addon">
				            <i class="fa fa-calendar"></i>
				          </div>
				          <input type="datetime-local" class="form-control pull-right"  name="sampai" >
				        </div>
				      </div>
				      </div>
							<div class="col-lg-4 right">
										<button class="btn btn-primary btn-3d">Filter</button>
							</div>
				      </div>

				    </form>
				<div id="print_lpkeuangan" class="col-md-12" style="margin-top:20px;">
						<div class="col-md-12 col-sm-12">
							<h2 class="">Laporan Keuangan</h2>
						</div>
				<div class="responsive-table">
					<table border="0" width="100%">
						<tr>
							<th></th>
							<th><h3>Debit</h3></th>
							<th></th>
							<th></th>
							<th><h3>Credit</h3></th>
						</tr>
						<tr>
							<td>Pembelian</td>
							<td>:</td>
							<td>{{"Rp.".number_format($lp_pembelian->total)}}</td>
							<td>Penjualan</td>
							<td>:</td>
							<td>{{"Rp.".number_format($lp_penjualan->total)}}</td>
						</tr>
						<tr>
							<td>Spoil</td>
							<td>:</td>
							<td>{{"Rp.".number_format($lp_spoil->total)}}</td>
						</tr>
						<tr>
							<td>Retur</td>
							<td>:</td>
							<td>{{"Rp.".number_format($lp_retur->total)}}</td>
						</tr>
						<tr>
							<td>Opname</td>
							<td>:</td>
							<td>{{"Rp.".number_format($lp_opname->total)}}</td>
						</tr>
						<tr style="color:green;">
							<?php if ($lp_untung > 0): ?>
								<td colspan="5" ><h2>Untung</h2></td>
								<td><h2>{{"Rp.".number_format($lp_untung)}}</h2></td>
						</tr>
								<?php else: ?>
						<tr style="color:red;">
								<td colspan="5" ><h2>Rugi</h2></td>
								<td><h2>{{"Rp.".number_format($lp_rugi)}}</h2></td>
							<?php endif; ?>
						</tr>
					</table>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
