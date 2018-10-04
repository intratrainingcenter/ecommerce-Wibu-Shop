<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class FrontendControler extends Controller
{
    public function Index() {
      $Produck = Produk::where('status' ,'Siap')->limit(3)->orderBy('id','ASC')->get();
      return view('frontend.pages.produck',compact(['Produck']));
    }
    public function product_list() {
      $Produck = Produk::where('status' ,'Siap')->limit(9)->orderBy('id','ASC')->get();
      return view('frontend.pages.shop-product-list',compact(['Produck']));
    }
    public function Checkout() {
      return view('frontend.pages.checkout.shop-checkout');
    }
}
