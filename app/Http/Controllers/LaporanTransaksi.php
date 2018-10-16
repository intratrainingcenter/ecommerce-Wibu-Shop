<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanTransaksi extends Controller
{
    public function index() {
      $date = date('Y-m-d');
      $Shell = DB::table('transaksi_pembelians')->join('users','users.kode_user','=','transaksi_pembelians.kode_user')->where('transaksi_pembelians.created_at', $date)->get();
      $Buy = DB::table('transaksi_penjualans')->join('keranjangs','keranjangs.kode_keranjang','=','transaksi_penjualans.kode_keranjang')
              ->where('transaksi_penjualans.created_at', $date)->get();
      return view('Backend.LaporanTransaksi.general',compact(['Shell','Buy']));
    }
    public function Filter(Request $request) {
      $start = $request->dari;
      $finis = $request->sampai;
      $Shell = DB::table('transaksi_pembelians')
            ->join('users','users.kode_user','=','transaksi_pembelians.kode_user')
            ->select('transaksi_pembelians.*' ,'users.*', 'transaksi_pembelians.created_at as creat')
            ->whereBetween('transaksi_pembelians.created_at', [$start, $finis])->get();
      $Buy = DB::table('transaksi_penjualans')->join('keranjangs','keranjangs.kode_keranjang','=','transaksi_penjualans.kode_keranjang')
            ->select('transaksi_penjualans.*','pembelis.*' ,'keranjangs.*', 'transaksi_penjualans.created_at as creat')
            ->join('pembelis','pembelis.kode_pembeli','=','keranjangs.kode_pembeli')
            ->whereBetween('transaksi_penjualans.created_at', [$start, $finis])
            ->get();
      return view('Backend.LaporanTransaksi.general',compact(['Shell','Buy']));
    }
}
