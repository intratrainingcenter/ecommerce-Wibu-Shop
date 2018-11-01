<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class KeuanganController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }
    public function Index() {
      $date = date('Y-m-d');
      $minutes = now()->addMinutes(2);
      $getShell = Cache::remember('Shellkeuangan',$minutes , function () {
        return DB::table('transaksi_pembelians')->get();
      });
      $getBuy = Cache::remember('Buykeuangan',$minutes , function () {
        return DB::table('transaksi_penjualans')->get();
      });
      $Shell  = $getShell->where('updated_at',$date)->sum('sub_total');
      $Buy    = $getBuy->where('updated_at',$date)->sum('grand_total');
      return view('Backend.LaporanKeuangan.general',compact('Shell','Buy'));
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
      $Shell = $getShell->where('updated_at','>=',$start)->where('updated_at','<=',$finis)->sum('sub_total');
      $Buy = $getBuy->where('updated_at','>=',$start)->where('updated_at','<=',$finis)->sum('grand_total');
      return view('Backend.LaporanKeuangan.general',compact('Shell','Buy'));
    }
}
