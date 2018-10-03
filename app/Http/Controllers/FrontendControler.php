<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class FrontendControler extends Controller
{
    public function Index() {
      $Produck = Produk::limit(3)->get();
      return view('frontend.pages.produck',compact(['Produck']));
    }
    public function product_list() {
      // dd($Produck);
      return view('frontend.pages.shop-product-list');
    }
}
