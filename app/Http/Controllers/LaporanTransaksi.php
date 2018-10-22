<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
class LaporanTransaksi extends Controller
{
    public function index() {
      $minutes = now()->addMinutes(2);

      $Shell = Cache::remember('ShellTransaksi', $minutes, function () {
        $date = date('Y-m-d');
                  return DB::table('transaksi_pembelians')->join('users','users.kode_user','=','transaksi_pembelians.kode_user')->where('transaksi_pembelians.created_at', $date)->get();
          });
      $Buy = Cache::remember('BuyTransaksi', $minutes, function () {
            $date = date('Y-m-d');
                  return DB::table('transaksi_penjualans')->join('keranjangs','keranjangs.kode_keranjang','=','transaksi_penjualans.kode_keranjang')->where('transaksi_penjualans.created_at', $date)->get();
          });
          // dd($Buy);
      return view('Backend.LaporanTransaksi.general',compact(['Shell','Buy']));
    }
    public function Filter(Request $request) {
      $minutes = now()->addMinutes(2);
      $start = $request->dari;
      $finis = $request->sampai;
      $Shell = Cache::remember('ShellfilterTransaksi', $minutes, function () use ($start, $finis)  {
          return DB::table('transaksi_pembelians')->join('users','users.kode_user','=','transaksi_pembelians.kode_user')
                      ->select('transaksi_pembelians.*' ,'users.*', 'transaksi_pembelians.created_at as creat')
                      ->whereBetween('transaksi_pembelians.created_at', [$start, $finis])->get();
      });
      $Buy = Cache::remember('BuyfilterTransaksi', $minutes, function () use ($start, $finis) {
                  return DB::table('transaksi_penjualans')->join('keranjangs','keranjangs.kode_keranjang','=','transaksi_penjualans.kode_keranjang')
                        ->select('transaksi_penjualans.*','pembelis.*' ,'keranjangs.*', 'transaksi_penjualans.created_at as creat')
                        ->join('pembelis','pembelis.kode_pembeli','=','keranjangs.kode_pembeli')
                        ->whereBetween('transaksi_penjualans.created_at', [$start, $finis])
                        ->get();
          });
      return view('Backend.LaporanTransaksi.general',compact(['Shell','Buy']));
    }
}
