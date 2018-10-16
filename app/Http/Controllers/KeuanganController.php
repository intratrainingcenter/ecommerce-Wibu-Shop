<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KeuanganController extends Controller
{
    public function Index() {
      $date = date('Y-m-d');
      $Shell = DB::table('transaksi_pembelians')
                     ->selectRaw('sum(sub_total) as total')
                     ->where('kode_transaksi_pembelian', 'like', 'TrRb%')
                     ->where('created_at', $date)
                     ->first();
      $Buy = DB::table('transaksi_penjualans')
                     ->selectRaw('sum(grand_total) as total')
                     ->where('kode_transaksi_penjualan', 'like', 'TrR%')
                     ->where('created_at', $date)
                     ->first();
      $untung = $Shell>$Buy;
      $Rugi = $Shell<$Buy;
      return view('Backend.LaporanKeuangan.general',compact(['Shell','Buy']));
    }
    public function Filter(Request $request) {
      $start = $request->dari;
      $finis = $request->sampai;
      $Shell = DB::table('transaksi_pembelians')
                     ->selectRaw('sum(sub_total) as total')
                     ->where('kode_transaksi_pembelian', 'like', 'TrRb%')
                     ->whereBetween('created_at', [$start, $finis])
                     ->first();
      $Buy = DB::table('transaksi_penjualans')
                     ->selectRaw('sum(grand_total) as total')
                     ->where('kode_transaksi_penjualan', 'like', 'TrR%')
                     ->whereBetween('created_at', [$start, $finis])
                     ->first();
      $untung = $Shell>$Buy;
      $Rugi = $Shell<$Buy;
      return view('Backend.LaporanKeuangan.general',compact(['Shell','Buy']));
    }
}
