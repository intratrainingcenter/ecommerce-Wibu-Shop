<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Produk;
use App\Kategori;
use App\reviewProduct;
use App\Keranjang;
use App\Pembeli;


class FrontendControler extends Controller
{
    public function Index() {
      $user = Auth::guard('pembeli')->id();
      $Pembeli = Pembeli::where('id', $user)->first();
      $kategori = Kategori::all();
      $all_products = Produk::limit(4)->orderBy('id','ASC')->get();
      $three_products = Produk::where('status' ,'Siap')->limit(3)->orderBy('id','ASC')->get();
      $two_products = Produk::where('status' ,'Siap')->limit(2)->orderBy('id','ASC')->get();
      $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();

      return view('frontend.pages.product.product',compact(['two_products','all_products','three_products','kategori','UserCart']));
    }
    public function product_list($kode_kategori) {
      $kategori = Kategori::all();
      $all_products = Produk::limit(4)->orderBy('id','ASC')->get();;
      $three_products = Produk::where('status' ,'Siap')->where('kode_kategori',$kode_kategori)->orderBy('id','ASC')->paginate(9);
      $two_products = Produk::where('status' ,'Siap')->limit(3)->orderBy('id','ASC')->get();
      return view('frontend.pages.product.shop-product-list',compact(['two_products','all_products','three_products','kategori']));
    }
    public function Checkout() {
      $all_products = Produk::limit(4)->orderBy('id','ASC')->get();;
      $kategori = Kategori::all();
      return view('frontend.pages.checkout.shop-checkout',compact(['all_products','kategori']));
    }
    public function Shop_item($kode_porduk) {
      $kategori = Kategori::all();
      $all_products = Produk::limit(4)->orderBy('id','ASC')->get();
      $view_products = Produk::where('kode_produk',$kode_porduk)->first();
      $review = reviewProduct::where('kode_produk',$kode_porduk)->limit(4)->orderBy('id','ASC')->get();
      $three_products = Produk::where('status' ,'Siap')->limit(3)->orderBy('id','ASC')->get();
      $two_products = Produk::where('status' ,'Siap')->limit(2)->orderBy('id','ASC')->get();
      return view('frontend.pages.product.shop-item',compact(['two_products','review','view_products','all_products','three_products','kategori']));
    }
}
