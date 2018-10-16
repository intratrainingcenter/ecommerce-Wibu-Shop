<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\reviewProduct;

class FrontendControler extends Controller
{
    public function Index() {
      $kategori = Kategori::all();
      $all_products = Produk::orderBy('created_at','desc')->get();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $three_products = Produk::where('status' ,'Siap')->limit(3)->orderBy('created_at','desc')->get();
      $two_products = Produk::where('status' ,'Siap')->limit(2)->orderBy('stok','desc')->get();
      return view('frontend.pages.product.product',compact(['two_products','all_products','three_products','kategori','new_products']));
    }
    public function product_list($kode_kategori) {
      $kategori = Kategori::all();
      $nama_kategori = Kategori::where('kode_kategori', $kode_kategori)->first();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $all_products = Produk::where('kode_kategori', $kode_kategori)->orderBy('created_at','desc')->paginate(9);
      return view('frontend.pages.product.shop-product-list',compact(['all_products','kategori', 'nama_kategori','new_products']));
    }
    public function Checkout() {
      $all_products = Produk::orderBy('created_at','desc')->get();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $kategori = Kategori::all();
      return view('frontend.pages.checkout.shop-checkout',compact(['all_products','kategori','new_products']));
    }
    public function Shop_item($kode_porduk) {
      $kategori = Kategori::all();
      $all_products = Produk::orderBy('created_at','desc')->get();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $view_products = Produk::where('kode_produk',$kode_porduk)->first();
      $review = reviewProduct::where('kode_produk',$kode_porduk)->limit(4)->orderBy('created_at','desc')->get();
      $three_products = Produk::where('status' ,'Siap')->limit(3)->orderBy('created_at','desc')->get();
      $two_products = Produk::where('status' ,'Siap')->limit(2)->orderBy('created_at','desc')->get();
      return view('frontend.pages.product.shop-item',compact(['two_products','review','view_products','all_products','three_products','kategori','new_products']));
    }
    public function AllProducts()
    {
      $kategori = Kategori::all();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $all_products = Produk::orderBy('created_at','desc')->paginate(9);
      return view('frontend.pages.product.all-products', compact('kategori', 'all_products','new_products'));
    }
}
