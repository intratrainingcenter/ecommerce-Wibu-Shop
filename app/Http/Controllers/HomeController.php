<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiPenjualan as Penjualan;
use App\Pembeli;
use App\Produk;
use App\User;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        $product        = Produk::all();
        $transaction    = Penjualan::where('tanggal', date('Y-m-d'))->get();
        $buyer          = Pembeli::all();
        return view('Backend.Dashboard.index', compact('product','transaction','buyer'));
    }


}
