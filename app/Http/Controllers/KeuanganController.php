<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class KeuanganController extends Controller
{
    public function Index() {
      $date = date('Y-m-d');
      $minutes = now()->addMinutes(2);
      $Shell = Cache::remember('Shellkeuangan',$minutes , function () use ($date) {
        return DB::table('transaksi_pembelians')
                  ->selectRaw('sum(sub_total) as total')
                  ->where('kode_transaksi_pembelian', 'like', 'TrRb%')
                  ->where('created_at', $date)
                  ->first();
      });
      $Buy = Cache::remember('Buykeuangan',$minutes , function () use ($date) {
        return DB::table('transaksi_penjualans')
                  ->selectRaw('sum(grand_total) as total')
                  ->where('kode_transaksi_penjualan', 'like', 'TrR%')
                  ->where('created_at', $date)
                  ->first();
      });
      return view('Backend.LaporanKeuangan.general',compact(['Shell','Buy']));
    }
    public function Filter(Request $request) {
      $start = $request->dari;
      $finis = $request->sampai;
      $minutes = now()->addMinutes(2);
      $getShell = Cache::remember('Shellfilterkeuangan',$minutes , function () {
        return DB::table('transaksi_pembelians')->get();
      });
      $getBuy = Cache::remember('Buyfilterkeuangan',$minutes , function () {
        return DB::table('transaksi_penjualans')->get();
      });
      $Shell = $getShell->where('created_at','>=',$start)->where('created_at','<',$finis)->sum('sub_total');
      $Buy = $getBuy->where('created_at','>=',$start)->where('created_at','<',$finis)->sum('grand_total');
      return view('Backend.LaporanKeuangan.general',compact(['Shell','Buy']));
    }
}
