<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendControler extends Controller
{
    public function Index()
    {
      return view('frontend.pages.produck');
    }
    public function product_list()
    {
      return view('frontend.pages.shop-product-list');
    }
}
