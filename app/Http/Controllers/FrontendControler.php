<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;

class FrontendControler extends Controller
{
    public function Index() {
      $kategori = Kategori::all();
      $Produck = Produk::where('status' ,'Siap')->limit(3)->orderBy('id','ASC')->get();
      return view('frontend.pages.produck',compact(['Produck','kategori']));
    }
    public function product_list() {
      $kategori = Kategori::all();
      $Produck = Produk::where('status' ,'Siap')->limit(9)->orderBy('id','ASC')->get();
      return view('frontend.pages.shop-product-list',compact(['Produck','kategori']));
    }
    public function Checkout() {
      return view('frontend.pages.checkout.shop-checkout');
    }
}
