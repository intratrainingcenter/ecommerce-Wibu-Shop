<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Produk;
use App\Kategori;
use App\Keranjang;
use App\OpsiPromo;
use App\Pembeli;
use App\Promo;
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
        $showPromo      = Promo::all();
        $UserCart       = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        $SUM            = $UserCart->sum('sub_total');


         return view('frontend.pages.cart.cart',compact(['showPromo','new_products','all_products','three_products','kategori','UserCart', 'SUM','Promo']));
    }

    public function ShowCart()
    {
        $showPromo  = Promo::all();
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
        $showPromo      = Promo::all();
        $Pembeli        = Pembeli::where('id', $user)->first();
        $UserCart       = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        $SUM            = $UserCart->sum('sub_total');
        $checkPromo     = Keranjang::join('promos','promos.kode_promo','keranjangs.kode_promo')->get();
        foreach ($checkPromo as $key) {
          $typediskon = $key->jenis_promo;
          $diskon     = $key->kode_produk_bonus;
        }
        $count = count($checkPromo);
        return view('frontend.pages.cart.loadcart',compact('count','showPromo','UserCart', 'SUM','typediskon','diskon'));
    }

    public function AddToCart(Request $request, $code)
    {
        $user           = Auth::guard('pembeli')->id();
        $Pembeli        = Pembeli::where('id', $user)->first();
        $Product        = Produk::where('kode_produk', $code)->first();
        $showPromo      = Promo::all();
        $CountTransaction = Penjualan::where('kode_pembeli', $Pembeli->kode_pembeli)->count() + 1;
        $kode_keranjang = 'CART-' . $user . '-' . $CountTransaction;
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
            $insert->kode_promo     =   $request->kode_promo;
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
        $checkdata          =   Keranjang::where('kode_keranjang', $kode_keranjang)->where('kode_produk', $kode_produk)->get();
        foreach ($checkdata as $key) {
            $checkKode = $key->kode_promo;
        }
        if ($checkKode == null) {
          $checkPromo = OpsiPromo::where('kode_produk',$kode_produk)->get();
          if (count($checkPromo) != 0) {
                foreach ($checkPromo as $check) {
                    $promo[] = Promo::where('kode_promo',$check->kode_promo)->where('min','<=',$jumlah)->where('max','>=',$jumlah)->get();
                  }
                  foreach ($promo as $key) {
                  }
                  foreach ($key as $keyue) {
                      $prom = $keyue->kode_promo;
                      $diskon = $keyue->diskon;
                      $product = $keyue->kode_produk_bonus;
                  }
                  if (count($key) != 0) {
                    $data           =   Keranjang::where('kode_keranjang', $kode_keranjang)->where('kode_produk', $kode_produk);
                    $data->update([
                      'kode_promo'=>  $prom,
                      'jumlah'    =>  $jumlah,
                      'sub_total' =>  $sub_total - $diskon,
                    ]);
                    return response()->json($data);
                  }else {
                    $data           =   Keranjang::where('kode_keranjang', $kode_keranjang)->where('kode_produk', $kode_produk);
                    $data->update([
                      'kode_promo'=>  "",
                      'jumlah'    =>  $jumlah,
                      'sub_total' =>  $sub_total,
                    ]);
                    return response()->json($data);
                  }
            }else {
              $data           =   Keranjang::where('kode_keranjang', $kode_keranjang)->where('kode_produk', $kode_produk);
              $data->update([
                'kode_promo'=>  "",
                'jumlah'    =>  $jumlah,
                'sub_total' =>  $sub_total,
              ]);
              return response()->json($data);
            }
        }else {
        $check = Promo::where('kode_promo',$checkKode)->where('min','<=',$jumlah)->where('max','>=',$jumlah)->get();
            if (count($check) != 0) {
              $checkPromo = OpsiPromo::where('kode_produk',$kode_produk)->get();
                  foreach ($checkPromo as $check) {
                    $promo[] = Promo::where('kode_promo',$check->kode_promo)->where('min','<=',$jumlah)->where('max','>=',$jumlah)->get();
                  }
                  foreach ($promo as $key) {
                    foreach ($key as $keyue) {
                      $prom = $keyue->kode_promo;
                      $diskon = $keyue->diskon;
                      $product = $keyue->kode_produk_bonus;
                    }
                  }
              $data           =   Keranjang::where('kode_keranjang', $kode_keranjang)->where('kode_produk', $kode_produk);
              $data->update([
                'kode_promo'=>  $prom,
                'jumlah'    =>  $jumlah,
                'sub_total' =>  $sub_total - $diskon,
              ]);
              return response()->json($data);
            }else {
              $data           =   Keranjang::where('kode_keranjang', $kode_keranjang)->where('kode_produk', $kode_produk);
              $data->update([
                'kode_promo'=>  "",
                'jumlah'    =>  $jumlah,
                'sub_total' =>  $sub_total,
              ]);
              return response()->json($data);
            }
          }
    }

    public function DeleteCartProduk($id)
    {
      $Delete = Keranjang::where('id',$id)->first();
      $Delete->delete();
      return redirect()->back();

     }

}
