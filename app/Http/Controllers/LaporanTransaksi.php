<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
class LaporanTransaksi extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }
    public function index() {
      $minutes = now()->addMinutes(2);
      $date = date('Y-m-d');

      $Shell = Cache::remember('ShellTransaksi', $minutes, function () use ($date) {
            return DB::table('transaksi_pembelians')
                    ->join('users','users.kode_user','=','transaksi_pembelians.kode_user')
                    ->select('transaksi_pembelians.*' ,'users.*','transaksi_pembelians.created_at as creat','transaksi_pembelians.status as stausproduct')
                    ->where('transaksi_pembelians.created_at',$date)
                    ->where('transaksi_pembelians.status','Done')
                    ->get();
          });
      $Buy = Cache::remember('BuyTransaksi', $minutes, function () use ($date) {
            return DB::table('transaksi_penjualans')
                        ->join('keranjangs','keranjangs.kode_keranjang','=','transaksi_penjualans.kode_keranjang')
                        ->join('pembelis','pembelis.kode_pembeli','=','keranjangs.kode_pembeli')
                        ->select('transaksi_penjualans.*','pembelis.*' ,'keranjangs.*', 'transaksi_penjualans.created_at as creat','transaksi_penjualans.status as statusjual')
                        ->where('transaksi_penjualans.created_at',$date)
                        ->where('transaksi_penjualans.status','Received')
                        ->get();
          });
      return view('Backend.LaporanTransaksi.general',compact(['Shell','Buy']));
    }
    public function Filter(Request $request) {
      $minutes = now()->addMinutes(2);
      $start = $request->dari;
      $finis = $request->sampai;
      $getShell = Cache::remember('ShellfilterTransaksi', $minutes, function ()  {
          return DB::table('transaksi_pembelians')->join('users','users.kode_user','=','transaksi_pembelians.kode_user')
                      ->select('transaksi_pembelians.*','transaksi_pembelians.created_at as creat','users.*','transaksi_pembelians.status as stausproduct')
                      ->get();
      });
      $getBuy = Cache::remember('BuyfilterTransaksi', $minutes, function () {
                  return DB::table('transaksi_penjualans')->join('keranjangs','keranjangs.kode_keranjang','=','transaksi_penjualans.kode_keranjang')
                        ->select('transaksi_penjualans.*','pembelis.*' ,'keranjangs.*', 'transaksi_penjualans.updated_at as creat','transaksi_penjualans.status as statusjual')
                        ->join('pembelis','pembelis.kode_pembeli','=','keranjangs.kode_pembeli')
                        ->get();
          });
          $Shell = $getShell->where('creat','>=',$start)->where('creat','<=',$finis)->where('stausproduct','Done');
          $Buy = $getBuy->where('creat','>=',$start)->where('creat','<=',$finis)->where('statusjual','Received');
      return view('Backend.LaporanTransaksi.general',compact(['Shell','Buy']));
    }
}
