<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Produk;
use App\Kategori;
use App\Keranjang;
use App\Pembeli;
use App\TransaksiPenjualan as Penjualan;

class FrontEndKeranjangController extends Controller
{
    public function cart()
    {
        $user           = Auth::guard('pembeli')->id();
        $Pembeli        = Pembeli::where('id', $user)->first();
        $kategori       = Kategori::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $UserCart       = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        $SUM            = $UserCart->sum('sub_total');


         return view('frontend.pages.cart.cart',compact(['new_products','all_products','three_products','kategori','UserCart', 'SUM']));
    }

    public function ShowCart()
    {
        $user       =   Auth::guard('pembeli')->id();
        $Pembeli    =   Pembeli::where('id', $user)->first();
        $cart       =   DB::table('keranjangs')
                        ->join('produks', 'keranjangs.kode_produk', '=', 'produks.kode_produk')
                        ->select('keranjangs.*', 'produks.nama_produk', 'produks.harga')
                        ->where('keranjangs.kode_pembeli', $Pembeli->kode_pembeli)
                        ->get();
        return $cart;
    }

    public function LoadCart()
    {
        $user           = Auth::guard('pembeli')->id();
        $Pembeli        = Pembeli::where('id', $user)->first();
        $UserCart       = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        $SUM            = $UserCart->sum('sub_total');

        return view('frontend.pages.cart.loadcart',compact('UserCart', 'SUM'));
    }

    public function AddToCart(Request $request, $code)
    {
        $user           = Auth::guard('pembeli')->id();
        $Pembeli        = Pembeli::where('id', $user)->first();
        $Product        = Produk::where('kode_produk', $code)->first();
        $CountTransaction = Penjualan::where('kode_pembeli', $Pembeli->kode_pembeli)->count() + 1;
        $kode_keranjang = 'CART-' . $Pembeli->kode_pembeli . '-' . $CountTransaction;
        $checkKeranjang = Keranjang::where('kode_produk',$code)->where('kode_pembeli',$Pembeli->kode_pembeli)->where('status', 'Pending')->exists();
        $keranjang      = Keranjang::where('kode_produk',$code)->where('kode_pembeli',$Pembeli->kode_pembeli)->where('status', 'Pending')->first();

        if ($checkKeranjang) {
            $jumlah     = $request->jumlah + $keranjang->jumlah;
            $sub_total  = $Product->harga * $jumlah;
            $update     = Keranjang::where('kode_produk',$code)->where('kode_pembeli',$Pembeli->kode_pembeli)->where('status', 'Pending');
            $update->update([
                'jumlah'    => $jumlah,
                'sub_total' => $sub_total,
            ]);
        } else {
            $insert = new Keranjang;
            $insert->kode_keranjang =   $kode_keranjang;
            $insert->kode_pembeli   =   $Pembeli->kode_pembeli;
            $insert->kode_produk    =   $Product->kode_produk;
            $insert->jumlah         =   $request->jumlah;
            $insert->sub_total      =   $Product->harga * $request->jumlah;
            $insert->status         =   'Pending';
            $insert->save();
        }

        return redirect()->back();
    }

    public function updateItem(Request $request, $kode_keranjang, $kode_produk)
    {
        $jumlah         =   $request->jumlah;
        $sub_total      =   $request->harga * $jumlah;
        $data           =   Keranjang::where('kode_keranjang', $kode_keranjang)->where('kode_produk', $kode_produk);
        $data->update([
            'jumlah'    =>  $jumlah,
            'sub_total' =>  $sub_total,
        ]);
        return response()->json($data);
    }

    public function DeleteCartProduk($id)
    {
      $Delete = Keranjang::where('id',$id)->first();
      $Delete->delete();
      return redirect()->back();

     }

}
