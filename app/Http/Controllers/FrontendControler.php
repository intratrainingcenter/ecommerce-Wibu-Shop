<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;

class FrontendControler extends Controller
{
    public function Index() {
      $kategori = Kategori::all();
      $all_products = Produk::all();
      $three_products = Produk::where('status' ,'Siap')->limit(3)->orderBy('id','ASC')->get();
      $two_products = Produk::where('status' ,'Siap')->limit(2)->orderBy('id','ASC')->get();
      return view('frontend.pages.product.product',compact(['two_products','all_products','three_products','kategori']));
    }
    public function product_list() {
      $kategori = Kategori::all();
      $all_products = Produk::all();
      $three_products = Produk::where('status' ,'Siap')->orderBy('id','ASC')->paginate(9);
      $two_products = Produk::where('status' ,'Siap')->limit(3)->orderBy('id','ASC')->get();
      return view('frontend.pages.product.shop-product-list',compact(['two_products','all_products','three_products','kategori']));
    }
    public function Checkout() {
      return view('frontend.pages.checkout.shop-checkout');
    }
    public function Shop_item($kode_porduk) {
      $kategori = Kategori::all();
      $all_products = Produk::all();
      $view_products = Produk::where('kode_produk',$kode_porduk)->first();
      // dd($view_products);
      $three_products = Produk::where('status' ,'Siap')->limit(3)->orderBy('id','ASC')->get();
      $two_products = Produk::where('status' ,'Siap')->limit(2)->orderBy('id','ASC')->get();
      return view('frontend.pages.product.shop-item',compact(['two_products','view_products','all_products','three_products','kategori']));
    }
}
