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
    $data = Cache::remember('dataproduct',$minutes , function () use ($date)  {
            return DB::table('produks')
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
                     ->where('produks.created_at',$date)
                     ->get();
            });
    $Shell = Cache::remember('Shellproduct', $minutes , function () {
            return DB::table('transaksi_penjualans')
                      ->select('transaksi_penjualans.kode_produk',DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'))
                      ->groupBy('kode_produk')->orderBy('kode_produk')
                      ->get();
          });
    $Buy = Cache::remember('Buyproduct' , $minutes , function ()   {
          return DB::table('transaksi_pembelians')
                    ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                    ->groupBy('kode_produk')->orderBy('kode_produk')
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
                      });
            $Shell =  Cache::remember('Shellfilterproducct1',$minutes,function () {
                        return DB::table('transaksi_penjualans')
                                    ->select('transaksi_penjualans.kode_produk',DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'))
                                    ->groupBy('kode_produk')->orderBy('kode_produk')
                                    ->get();
                      });
            $Buy =  Cache::remember('Buyfilterproduct1',$minutes,function () {
                        return DB::table('transaksi_pembelians')
                                  ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                                  ->groupBy('kode_produk')->orderBy('kode_produk')
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
                          });
              $data = $getData->where('kode_kategori','=',$codecategory);
              $Shell = Cache::remember('Shellfilterproduct2',$minutes, function ()  {
                            return DB::table('transaksi_penjualans')
                                      ->select('transaksi_penjualans.kode_produk',DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'))
                                      ->groupBy('kode_produk')->orderBy('kode_produk')
                                      ->get();
                          });
              $Buy = Cache::remember('Buyfilterproduct2',$minutes, function ()  {
                            return DB::table('transaksi_pembelians')
                                        ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                                        ->groupBy('kode_produk')->orderBy('kode_produk')
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
          $getData = Cache::remember('datafilterproduct3', $minutes, function () {
                              return DB::table('produks')
                              ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
                              ->leftJoin('transaksi_pembelians','transaksi_pembelians.kode_produk','=','produks.kode_produk')
                              ->leftJoin('transaksi_penjualans','transaksi_penjualans.kode_produk','=','produks.kode_produk')
                              ->select('produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                        'produks.nama_produk','produks.hpp','produks.harga','produks.updated_at',
                                        'kategoris.kode_kategori','kategoris.nama_kategori',
                                        DB::raw('SUM(produks.stok) as stock'),DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'),DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                              ->groupBy('produks.id','produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                        'produks.nama_produk','produks.hpp','produks.harga',
                                        'kategoris.kode_kategori','kategoris.id','kategoris.nama_kategori')
                              ->orderBy('produks.id')
                              ->get();
                            });
            $data =  $getData->where('updated_at', '>=', $start)->where('updated_at', '<', $finish);
          $Shell = Cache::remember('Shellfilterproduct3', $minutes, function () {
                              return DB::table('transaksi_penjualans')
                              ->select('transaksi_penjualans.kode_produk',DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'))
                              ->groupBy('kode_produk')->orderBy('kode_produk')
                              ->get();
                            });
          $Buy = Cache::remember('Buyfilterproduct3', $minutes, function () {
                              return DB::table('transaksi_pembelians')
                              ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                              ->groupBy('kode_produk')->orderBy('kode_produk')
                              ->get();
                            });
          $groupProduct = Cache::remember('groupProductfilterproduct3', $minutes, function () {
                              return DB::table('produks')->select('kode_produk')->groupBy('id')->get();
                            });
          return view('Backend.LaporanBarang.general',compact('data','selectcategory','category','groupProduct','Buy','Shell'));
            }else {
              // dd('berdasarkan kategori dan tanggal');
            $selectcategory = Cache::remember('selectcategoryfilterproduct3',$minutes, function ()   {
                              return DB::table('kategoris')->get();
                            });
            $category = $selectcategory->where('kode_kategori',$codecategory);
            $getData = Cache::remember('datafilterproduct3',$minutes, function () {
                            return DB::table('produks')
                                      ->join('kategoris','kategoris.kode_kategori','=','produks.kode_kategori')
                                      ->leftJoin('transaksi_pembelians','transaksi_pembelians.kode_produk','=','produks.kode_produk')
                                      ->leftJoin('transaksi_penjualans','transaksi_penjualans.kode_produk','=','produks.kode_produk')
                                      ->select('produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                                'produks.nama_produk','produks.hpp','produks.harga','produks.updated_at',
                                                'kategoris.kode_kategori','kategoris.nama_kategori',
                                                DB::raw('SUM(produks.stok) as stock'),DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'),DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                                      ->groupBy('produks.id','produks.kode_produk','produks.nama_produk','produks.kode_kategori',
                                                'produks.nama_produk','produks.hpp','produks.harga',
                                                'kategoris.kode_kategori','kategoris.id','kategoris.nama_kategori')
                                      ->orderBy('produks.id')
                                      ->get();
                          });
          $data = $getData->where('updated_at', '>=', $start)->where('updated_at', '<', $finish)->where('kode_kategori',$codecategory);
            $Shell = Cache::remember('Shellfilterproduct3',$minutes, function () {
                            return DB::table('transaksi_penjualans')
                                      ->select('transaksi_penjualans.kode_produk',DB::raw('SUM(transaksi_penjualans.jumlah) as keluar'))
                                      ->groupBy('kode_produk')->orderBy('kode_produk')
                                      ->get();
                          });
            $Buy = Cache::remember('Buyfilterproduct3',$minutes, function () {
                            return DB::table('transaksi_pembelians')
                                    ->select('transaksi_pembelians.kode_produk',DB::raw('SUM(transaksi_pembelians.jummlah) as masuk'))
                                    ->groupBy('kode_produk')->orderBy('kode_produk')
                                    ->get();
                          });
            $groupProduct = Cache::remember('groupProductfilterproduct3',$minutes, function () {
                            return DB::table('produks')->select('kode_produk')->groupBy('id')->get();
                          });
            return view('Backend.LaporanBarang.general',compact('data','selectcategory','category','groupProduct','Buy','Shell'));
          }
    }
  }
}
