<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reviewProduct;
use App\Kategori;
use App\Produk;

class reviewProducts extends Controller
{
    public function store(Request $request) {
      $date = date('Ymdhis');
      $count = reviewProduct::count()+1;
      $insert = new reviewProduct;
      $insert->kode_rivew='KR-0'.$date.$count;
      $insert->kode_produk=$request->kode_produk;
      $insert->nama_pembeli=$request->nama_pembeli;
      $insert->email_pembeli=$request->email_pembeli;
      $insert->review_product=$request->review_product;
      $insert->save();
      return redirect()->back();
    }
}
