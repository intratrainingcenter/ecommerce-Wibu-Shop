<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class laporanBarang extends Controller
{
  public function Index() {
    $category = DB::table('kategoris')->get();
    // dd($category);
    $date = date('Y-m-d');
    $data = DB::table('produks')
                   ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
                   ->leftJoin('transaksi_pembelians','transaksi_pembelians.kode_produk','=','produks.kode_produk')
                   ->leftJoin('transaksi_penjualans','transaksi_penjualans.kode_produk','=','produks.kode_produk')
                   ->select('produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                              'produks.nama_produk','produks.hpp','produks.harga',
                              'kategoris.kode_kategori','kategoris.nama_kategori',
                              DB::raw('SUM(produks.stok) as stock'),DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'),DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                   ->groupBy('produks.id','produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                              'produks.nama_produk','produks.hpp','produks.harga',
                              'kategoris.kode_kategori','kategoris.id','kategoris.nama_kategori')
                   ->orderBy('produks.id')
                   ->get();
    $Shell = DB::table('transaksi_penjualans')
                  ->select('transaksi_penjualans.kode_produk',DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'))
                  ->groupBy('kode_produk')->orderBy('kode_produk')
                  ->get();
    $Buy = DB::table('transaksi_pembelians')
                  ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                  ->groupBy('kode_produk')->orderBy('kode_produk')
                  ->get();
    $groupProduct = DB::table('produks')->select('kode_produk')->groupBy('id')->get();
    // dd($groupProduct);
    return view('Backend.LaporanBarang.general',compact('data','category','groupProduct','Buy','Shell'));
  }
  public function Filter(Request $request) {
    $codecategory = $request->kode_kategori;
    // dd($codecategory);
    $start = $request->dari;
    $finish = $request->sampai;
    if ($codecategory == 'ada' && $start == null && $finish == null) {
      // dd('ada');
      $category = DB::table('kategoris')->get();
      $date = date('Y-m-d');
      $data = DB::table('produks')
                     ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
                     ->leftJoin('transaksi_pembelians','transaksi_pembelians.kode_produk','=','produks.kode_produk')
                     ->leftJoin('transaksi_penjualans','transaksi_penjualans.kode_produk','=','produks.kode_produk')
                     ->select('produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                'produks.nama_produk','produks.hpp','produks.harga',
                                'kategoris.kode_kategori','kategoris.nama_kategori',
                                DB::raw('SUM(produks.stok) as stock'),DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'),DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                     ->groupBy('produks.id','produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                'produks.nama_produk','produks.hpp','produks.harga',
                                'kategoris.kode_kategori','kategoris.id','kategoris.nama_kategori')
                     ->orderBy('produks.id')
                     ->get();
      $Shell = DB::table('transaksi_penjualans')
                    ->select('transaksi_penjualans.kode_produk',DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'))
                    ->groupBy('kode_produk')->orderBy('kode_produk')
                    ->get();
      $Buy = DB::table('transaksi_pembelians')
                    ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                    ->groupBy('kode_produk')->orderBy('kode_produk')
                    ->get();
      $groupProduct = DB::table('produks')->select('kode_produk')->groupBy('id')->get();
      // dd($groupProduct);
      return view('Backend.LaporanBarang.general',compact('data','category','groupProduct','Buy','Shell'));
    }elseif ($start == null && $finish == null) {
      $category = DB::table('kategoris')->get();

      $date = date('Y-m-d');
      $data = DB::table('produks')
                     ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
                     ->leftJoin('transaksi_pembelians','transaksi_pembelians.kode_produk','=','produks.kode_produk')
                     ->leftJoin('transaksi_penjualans','transaksi_penjualans.kode_produk','=','produks.kode_produk')
                     ->select('produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                'produks.nama_produk','produks.hpp','produks.harga',
                                'kategoris.kode_kategori','kategoris.nama_kategori',
                                DB::raw('SUM(produks.stok) as stock'),DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'),DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                     ->groupBy('produks.id','produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                'produks.nama_produk','produks.hpp','produks.harga',
                                'kategoris.kode_kategori','kategoris.id','kategoris.nama_kategori')
                     ->orderBy('produks.id')
                     ->where('produks.kode_kategori','=',$codecategory)
                     ->get();
      $Shell = DB::table('transaksi_penjualans')
                    ->select('transaksi_penjualans.kode_produk',DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'))
                    ->groupBy('kode_produk')->orderBy('kode_produk')
                    ->get();
      $Buy = DB::table('transaksi_pembelians')
                    ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                    ->groupBy('kode_produk')->orderBy('kode_produk')
                    ->get();
      $groupProduct = DB::table('produks')->select('kode_produk')->groupBy('id')->get();
      // dd($groupProduct);
      return view('Backend.LaporanBarang.general',compact('data','category','groupProduct','Buy','Shell'));
    }else {
      if ($category == 'ada') {
        dd('ada ada');
        // code...
        $data = DB::table('produks')
              ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
              ->leftJoin('transaksi_pembelians','transaksi_pembelians.kode_produk','=','produks.kode_produk')
              ->leftJoin('transaksi_penjualans','transaksi_penjualans.kode_produk','=','produks.kode_produk')
              ->select('produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                        'produks.nama_produk','produks.hpp','produks.harga',
                        'kategoris.kode_kategori','kategoris.nama_kategori',
                        DB::raw('SUM(produks.stok) as stock'),DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'),DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
              ->groupBy('produks.id','produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                        'produks.nama_produk','produks.hpp','produks.harga',
                        'kategoris.kode_kategori','kategoris.id','kategoris.nama_kategori')
              ->orderBy('produks.id')
              ->whereBetween('produks.created_at',[$start,$finish])
              ->get();
        $category = DB::table('kategoris')->get();
        $Shell = DB::table('transaksi_penjualans')
                      ->select('transaksi_penjualans.kode_produk',DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'))
                      ->groupBy('kode_produk')->orderBy('kode_produk')
                      ->get();
        $Buy = DB::table('transaksi_pembelians')
                      ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                      ->groupBy('kode_produk')->orderBy('kode_produk')
                      ->get();
        $groupProduct = DB::table('produks')->select('kode_produk')->groupBy('kode_produk')->get();
        return view('Backend.LaporanBarang.general',compact('data','category','groupProduct','Buy','Shell'));
      }else {
      dd('tidak ada ada');
      $data = DB::table('produks')
                ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
                ->leftJoin('transaksi_pembelians','transaksi_pembelians.kode_produk','=','produks.kode_produk')
                ->leftJoin('transaksi_penjualans','transaksi_penjualans.kode_produk','=','produks.kode_produk')
                ->select('produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                        'produks.nama_produk','produks.hpp','produks.harga',
                        'kategoris.kode_kategori','kategoris.nama_kategori',
                        DB::raw('SUM(produks.stok) as stock'),DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'),DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                ->groupBy('produks.id','produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                        'produks.nama_produk','produks.hpp','produks.harga',
                        'kategoris.kode_kategori','kategoris.id','kategoris.nama_kategori')
                ->orderBy('produks.id')
                ->where('produks.kode_kategori','=',$category)
                ->whereBetween('produks.created_at',[$start,$finish])
                ->get();
      $category = DB::table('kategoris')->get();
      $Shell = DB::table('transaksi_penjualans')
                  ->select('transaksi_penjualans.kode_produk',DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'))
                  ->groupBy('kode_produk')->orderBy('kode_produk')
                  ->get();
      $Buy = DB::table('transaksi_pembelians')
                ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                ->groupBy('kode_produk')->orderBy('kode_produk')
                ->get();
      $groupProduct = DB::table('produks')->select('kode_produk')->groupBy('kode_produk')->get();
      return view('Backend.LaporanBarang.general',compact('data','category','groupProduct','Buy','Shell'));
    }
    }
  }
}
