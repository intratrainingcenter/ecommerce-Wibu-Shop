<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Produk;
use App\Kategori;
use App\Keranjang;
use App\Pembeli;

class FrontEndKeranjangController extends Controller
{
    public function cart()
    {
        $user = Auth::guard('pembeli')->id();
        $Pembeli = Pembeli::where('id', $user)->first();
        $kategori = Kategori::all();
        $all_products = Produk::all();
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();


         return view('frontend.pages.cart.cart',compact(['two_products','all_products','three_products','kategori','UserCart']));
    }

    public function AddToCart(Request $request, $id)
    {
        $code = date("Ymdhis");
        $count = Keranjang::count()+1;
        $user = Auth::guard('pembeli')->id();
        $Pembeli = Pembeli::where('id', $user)->first();
        $UserPembeli = Pembeli::where('kode_pembeli', $Pembeli->kode_pembeli)->first();
        $Product    = Produk::where('kode_produk', $id)->first();

        $insert = new Keranjang;
        $insert->kode_keranjang='cart'.$code.$count;
        $insert->kode_pembeli=$UserPembeli->kode_pembeli;
        $insert->kode_produk=$Product->kode_produk;
        $insert->jumlah= 1;
        $insert->sub_total=$Product->harga;
        $insert->status= 'Pending';
        $insert->save();


        return redirect('/shopping-cart');
    }
    public function DeleteCartProduk($id)
    {
      $Delete = Keranjang::where('id',$id)->first();
      $Delete->delete();
      return redirect('/shopping-cart');

     }

}
