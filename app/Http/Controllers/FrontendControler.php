<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendControler extends Controller
{
    public function Index()
    {
      return view('frontend.pages.produck');
    }
}
