<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanTransaksi extends Controller
{
    public function index() {
      $date = date('Y-m-d');
      $Shell = DB::table('transaksi_pembelians')
                     // ->where('created_at', $date)
                     ->get();
      $Buy = DB::table('transaksi_penjualans')
                    // ->where('created_at', $date)
                    ->get();
      return view('Backend.LaporanTransaksi.general',compact(['Shell','Buy']));
    }
}
