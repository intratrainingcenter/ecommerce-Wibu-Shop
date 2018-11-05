<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
class laporanBarang extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }
  public function Index() {
    $date = date('Y-m-d');
    $minutes = now()->addMinutes(1);
    $category = Cache::remember('categoryproduct', $minutes , function ()  {
                return DB::table('kategoris')->get();
              });
    $selectcategory = Cache::remember('selectcategoryproduct', $minutes , function ()  {
              return DB::table('kategoris')->get();
            });
    $data = Cache::remember('dataproduct',$minutes , function () use ($date) {
            return DB::table('produks')
                     ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
                     ->select('produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                'produks.nama_produk','produks.hpp','produks.harga',
                                'kategoris.kode_kategori','kategoris.nama_kategori',
                                DB::raw('SUM(produks.stok) as stock'))
                     ->groupBy('produks.id','produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                'produks.nama_produk','produks.hpp','produks.harga',
                                'kategoris.kode_kategori','kategoris.id','kategoris.nama_kategori')
                     ->where('produks.status','siap')
                     ->where('produks.created_at',$date)
                     ->get();
            });
    $Shell = Cache::remember('Shellproduct', $minutes , function () {
            return DB::table('transaksi_penjualans')
                      ->leftjoin('keranjangs','keranjangs.kode_keranjang','=','transaksi_penjualans.kode_keranjang')
                      ->select('keranjangs.kode_produk',DB::raw('SUM(keranjangs.jumlah) as keluar'))
                      ->groupBy('keranjangs.kode_produk')
                      ->where('transaksi_penjualans.status','Received')
                      ->orderBy('kode_produk')
                      ->get();
          });
    $Buy = Cache::remember('Buyproduct' , $minutes , function ()   {
          return DB::table('transaksi_pembelians')
                    ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                    ->groupBy('transaksi_pembelians.kode_produk')
                    ->where('transaksi_pembelians.status','Done')
                    ->orderBy('kode_produk')
                    ->get();
        });
    $groupProduct = Cache::remember('groupProductindex', $minutes ,function ()  {
      return DB::table('produks')->select('kode_produk')->groupBy('id')->get();
    });
    return view('Backend.LaporanBarang.general',compact('data','selectcategory','category','groupProduct','Buy','Shell'));
  }
  public function Filter(Request $request) {
    $codecategory = $request->kode_kategori;
    $start = $request->dari;
    $finish = $request->sampai;
    $minutes = now()->addMinutes(1);
      if ($codecategory == 'ada' && $start == null && $finish == null) {
            $selectcategory = Cache::remember('selectcategoryfilterproduct1', $minutes , function ()  {
                        return DB::table('kategoris')->get();
                      });
            $category = $selectcategory;
            $data = Cache::remember('datafilterproduct1',$minutes,function () {
                        return DB::table('produks')
                                  ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
                                  ->select('produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                             'produks.nama_produk','produks.hpp','produks.harga',
                                             'kategoris.kode_kategori','kategoris.nama_kategori',
                                             DB::raw('SUM(produks.stok) as stock'))
                                  ->groupBy('produks.id','produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                             'produks.nama_produk','produks.hpp','produks.harga',
                                             'kategoris.kode_kategori','kategoris.id','kategoris.nama_kategori')
                                  ->where('produks.status','siap')
                                  ->get();
                      });
            $Shell =  Cache::remember('Shellfilterproducct1',$minutes,function () {
                        return DB::table('transaksi_penjualans')
                                    ->leftjoin('keranjangs','keranjangs.kode_keranjang','=','transaksi_penjualans.kode_keranjang')
                                    ->select('keranjangs.kode_produk',DB::raw('SUM(keranjangs.jumlah) as keluar'))
                                    ->groupBy('keranjangs.kode_produk')
                                    ->where('transaksi_penjualans.status','Received')
                                    ->orderBy('kode_produk')
                                    ->get();
                      });
            $Buy =  Cache::remember('Buyfilterproduct1',$minutes,function () {
                        return DB::table('transaksi_pembelians')
                                  ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                                  ->groupBy('transaksi_pembelians.kode_produk')
                                  ->where('transaksi_pembelians.status','Done')
                                  ->orderBy('kode_produk')
                                  ->get();
                      });
            $groupProduct =  Cache::remember('groupProductfilterproduct1',$minutes,function () {
                          return DB::table('produks')->select('kode_produk')->groupBy('id')->get();
                        });
            return view('Backend.LaporanBarang.general',compact('data','selectcategory','category','groupProduct','Buy','Shell'));
          }elseif ($start == null && $finish == null) {
              $selectcategory = Cache::remember('selectcategoryfilterproduct2',$minutes, function ()  {
                            return DB::table('kategoris')->get();
                          });
              $category = $selectcategory->where('kode_kategori',$codecategory);
              $getData = Cache::remember('datafilterproduct2',$minutes, function (){
                            return DB::table('produks')
                                        ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
                                        ->select('produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                                   'produks.nama_produk','produks.hpp','produks.harga',
                                                   'kategoris.kode_kategori','kategoris.nama_kategori',
                                                   DB::raw('SUM(produks.stok) as stock'))
                                        ->groupBy('produks.id','produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                                   'produks.nama_produk','produks.hpp','produks.harga',
                                                   'kategoris.kode_kategori','kategoris.id','kategoris.nama_kategori')
                                        ->where('produks.status','siap')
                                        ->get();
                          });
              $data = $getData->where('kode_kategori','=',$codecategory);
              $Shell = Cache::remember('Shellfilterproduct2',$minutes, function ()  {
                            return DB::table('transaksi_penjualans')
                                      ->leftjoin('keranjangs','keranjangs.kode_keranjang','=','transaksi_penjualans.kode_keranjang')
                                      ->select('keranjangs.kode_produk',DB::raw('SUM(keranjangs.jumlah) as keluar'))
                                      ->groupBy('keranjangs.kode_produk')
                                      ->where('transaksi_penjualans.status','Received')
                                      ->orderBy('kode_produk')
                                      ->get();
                          });
              $Buy = Cache::remember('Buyfilterproduct2',$minutes, function ()  {
                            return DB::table('transaksi_pembelians')
                                        ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                                        ->groupBy('transaksi_pembelians.kode_produk')
                                        ->where('transaksi_pembelians.status','Done')
                                        ->orderBy('kode_produk')
                                        ->get();
                          });
              $groupProduct = Cache::remember('groupProductfilterproduct2',$minutes, function ()  {
                            return DB::table('produks')->select('kode_produk')->groupBy('id')->get();
                          });
        return view('Backend.LaporanBarang.general',compact('data','selectcategory','category','groupProduct','Buy','Shell'));
      }else {
        if ($codecategory == 'ada') {
          $category = Cache::remember('categoryfilterproduct3', $minutes, function () {
                              return DB::table('kategoris')->get();
                            });
          $selectcategory = Cache::remember('selectcategoryfilterproduct3', $minutes, function () {
                                return DB::table('kategoris')->get();
                              });
          $getData = Cache::remember('datafilterproduct3', $minutes, function () use ($start,$finish)  {
                              return DB::table('produks')
                              ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
                              ->select('produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                         'produks.nama_produk','produks.hpp','produks.harga',
                                         'kategoris.kode_kategori','kategoris.nama_kategori','produks.updated_at as update',
                                         DB::raw('SUM(produks.stok) as stock'))
                              ->groupBy('produks.id','produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                         'produks.nama_produk','produks.hpp','produks.harga',
                                         'kategoris.kode_kategori','kategoris.id','kategoris.nama_kategori')
                              ->where('produks.status','siap')
                              ->get();
                            });
            $data =  $getData->where('update', '>=', $start)->where('update', '<=', $finish);
          $Shell = Cache::remember('Shellfilterproduct3', $minutes, function () {
                              return DB::table('transaksi_penjualans')
                              ->leftjoin('keranjangs','keranjangs.kode_keranjang','=','transaksi_penjualans.kode_keranjang')
                              ->select('keranjangs.kode_produk',DB::raw('SUM(keranjangs.jumlah) as keluar'))
                              ->groupBy('keranjangs.kode_produk')
                              ->where('transaksi_penjualans.status','Received')
                              ->orderBy('kode_produk')
                              ->get();
                            });
          $Buy = Cache::remember('Buyfilterproduct3', $minutes, function () {
                              return DB::table('transaksi_pembelians')
                              ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                              ->groupBy('transaksi_pembelians.kode_produk')
                              ->where('transaksi_pembelians.status','Done')
                              ->orderBy('kode_produk')
                              ->get();
                            });
          $groupProduct = Cache::remember('groupProductfilterproduct3', $minutes, function () {
                              return DB::table('produks')->select('kode_produk')->groupBy('id')->get();
                            });
          return view('Backend.LaporanBarang.general',compact('data','selectcategory','category','groupProduct','Buy','Shell'));
            }else {
            $selectcategory = Cache::remember('selectcategoryfilterproduct4',$minutes, function ()   {
                              return DB::table('kategoris')->get();
                            });
            $category = $selectcategory->where('kode_kategori',$codecategory);
                          $getData = Cache::remember('datafilterproduct4', $minutes, function () use ($start,$finish)  {
                                              return DB::table('produks')
                                              ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
                                              ->select('produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                                         'produks.nama_produk','produks.hpp','produks.harga',
                                                         'kategoris.kode_kategori','kategoris.nama_kategori','produks.updated_at as update',
                                                         DB::raw('SUM(produks.stok) as stock'))
                                              ->groupBy('produks.id','produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                                         'produks.nama_produk','produks.hpp','produks.harga',
                                                         'kategoris.kode_kategori','kategoris.id','kategoris.nama_kategori')
                                              ->where('produks.status','siap')
                                              ->get();
                                            });
                            $data =  $getData->where('update', '>=', $start)->where('update', '<=', $finish)->where('kode_kategori',$codecategory);
            $Shell = Cache::remember('Shellfilterproduct4',$minutes, function () {
                            return DB::table('transaksi_penjualans')
                                      ->leftjoin('keranjangs','keranjangs.kode_keranjang','=','transaksi_penjualans.kode_keranjang')
                                      ->select('keranjangs.kode_produk',DB::raw('SUM(keranjangs.jumlah) as keluar'))
                                      ->groupBy('keranjangs.kode_produk')
                                      ->where('transaksi_penjualans.status','Received')
                                      ->orderBy('kode_produk')
                                      ->get();
                          });
            $Buy = Cache::remember('Buyfilterproduct4',$minutes, function () {
                            return DB::table('transaksi_pembelians')
                                    ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                                    ->groupBy('transaksi_pembelians.kode_produk')
                                    ->where('transaksi_pembelians.status','Done')
                                    ->orderBy('kode_produk')
                                    ->get();
                          });
            $groupProduct = Cache::remember('groupProductfilterproduct4',$minutes, function () {
                            return DB::table('produks')->select('kode_produk')->groupBy('id')->get();
                          });
            return view('Backend.LaporanBarang.general',compact('data','selectcategory','category','groupProduct','Buy','Shell'));
          }
    }
  }
}
