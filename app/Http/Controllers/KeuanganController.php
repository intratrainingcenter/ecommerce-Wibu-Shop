<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KeuanganController extends Controller
{
    public function Index() {
      $Shell = DB::table('transaksi_pembelians')
                     ->selectRaw('sum(sub_total) as total')
                     ->where('kode_transaksi_pembelian', 'like', 'TrRb%')
                     // ->where('tgl_transaksi', $dt)
                     ->first();
      $Buy = DB::table('transaksi_penjualans')
                     ->selectRaw('sum(grand_total) as total')
                     ->where('kode_transaksi_penjualan', 'like', 'TrR%')
                     // ->where('tgl_transaksi', $dt)
                     ->first();
      $untung = $Shell>$Buy;
      $Rugi = $Shell<$Buy;
      return view('Backend.LaporanKeuangan.general',compact(['Shell','Buy']));
    }
}
