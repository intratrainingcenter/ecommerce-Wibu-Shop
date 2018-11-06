<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Produk;
use App\Kategori;
use App\reviewProduct;
use App\Keranjang;
use App\Pembeli;
use App\OpsiPromo;
use App\Alamat;


class FrontendControler extends Controller
{
    public function Index() {
      $kategori = Kategori::all();
      $user = Auth::guard('pembeli')->id();
      $Pembeli = Pembeli::where('id', $user)->first();
      if( $user != NULL) {
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();
      } else {
          $UserCart = [];
      }
      $all_products = Produk::orderBy('created_at','desc')->get();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $three_products = Produk::where('status' ,'Siap')->limit(3)->orderBy('created_at','desc')->get();
      $two_products = Produk::where('status' ,'Siap')->limit(2)->orderBy('stok','desc')->get();
      return view('frontend.pages.product.product',compact(['two_products','all_products','three_products','kategori','new_products', 'UserCart']));
    }
    public function product_list($kode_kategori) {
      $user = Auth::guard('pembeli')->id();
      $Pembeli = Pembeli::where('id', $user)->first();
      $kategori = Kategori::all();
      $nama_kategori = Kategori::where('kode_kategori', $kode_kategori)->first();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $all_products = Produk::where('kode_kategori', $kode_kategori)->orderBy('created_at','desc')->paginate(9);
      $user = Auth::guard('pembeli')->id();
      if( $user != NULL) {
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();
      } else {
          $UserCart = [];
      }
      return view('frontend.pages.product.shop-product-list',compact(['all_products','kategori', 'nama_kategori','new_products', 'UserCart']));
    }
    public function Checkout() {
      $all_products = Produk::orderBy('created_at','desc')->get();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $kategori = Kategori::all();
      $user = Auth::guard('pembeli')->id();
      $Pembeli = Pembeli::where('id', $user)->first();
      $addresses  = Alamat::where('kode_pembeli', $Pembeli->kode_pembeli)->get();
      if( $user != NULL) {
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();
        $SUM            = $UserCart->sum('sub_total');
      } else {
          $UserCart = [];
      }
      return view('frontend.pages.checkout.shop-checkout',compact(['SUM','addresses','all_products','kategori','new_products', 'UserCart']));
    }
    public function checkoutAddress(Request $request)
    {
      $userId     = Auth::guard('pembeli')->id();
      $Pembeli    = Pembeli::where('id', $userId)->first();
      $addresses  = Alamat::where('kode_alamat', $request->code)->first();
      return $addresses;
    }
    public function shippingCost(Request $request)
    {
      $courier = ['jne','pos','tiki'];

      foreach ($courier as $key => $value) {

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=151&destination=".$request->destination."&weight=".$request->weight."&courier=".$value."",
        CURLOPT_HTTPHEADER => array(
          "content-type: application/x-www-form-urlencoded",
          "key: 9e75f7010c470ab9611072c4444605be"
        ),
      ));
    

        $response = curl_exec($curl);
      
        $err = curl_error($curl);

        curl_close($curl);

        $dec = json_decode($response, true);
        $all[] = $dec['rajaongkir']['results'];
      
      }

      return $all;
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $all;
        }
      
    }
    public function Shop_item($kode_porduk) {
      $user = Auth::guard('pembeli')->id();
      $Pembeli = Pembeli::where('id', $user)->first();
      $Promo  = OpsiPromo::where('kode_produk', $kode_porduk)->get();
      if( $user != NULL) {
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();
      } else {
          $UserCart = [];
      }
      $kategori = Kategori::all();
      $all_products = Produk::orderBy('created_at','desc')->get();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $view_products = Produk::where('kode_produk',$kode_porduk)->first();
      $review = reviewProduct::where('kode_produk',$kode_porduk)->limit(4)->orderBy('created_at','desc')->get();
      $three_products = Produk::where('status' ,'Siap')->limit(3)->orderBy('created_at','desc')->get();
      $two_products = Produk::where('status' ,'Siap')->limit(2)->orderBy('created_at','desc')->get();
      return view('frontend.pages.product.shop-item',compact(['Promo','two_products','review','view_products','all_products','three_products','kategori','new_products', 'UserCart']));
    }
    public function AllProducts()
    {
      $kategori     = Kategori::all();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $all_products = Produk::orderBy('created_at','desc')->paginate(9);
      $user         = Auth::guard('pembeli')->id();
      $Pembeli      = Pembeli::where('id', $user)->first();
      if( $user != NULL) {
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();
      } else {
          $UserCart = [];
      }
      return view('frontend.pages.product.all-products', compact('kategori', 'all_products','new_products', 'UserCart'));
    }

    public function search(Request $request)
    {
      $input        = $request->search;
      $kategori     = Kategori::all();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $all_products = Produk::where('nama_produk', 'like', '%'.$input.'%')->orderBy('created_at','desc')->paginate(9);
      $user         = Auth::guard('pembeli')->id();
      $Pembeli      = Pembeli::where('id', $user)->first();
      if( $user != NULL) {
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();
      } else {
          $UserCart = [];
      }
      return view('frontend.pages.product.all-products', compact('kategori', 'all_products','new_products', 'UserCart'));
    }

    public function filter(Request $request)
    {
      $kategori     = Kategori::all();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $user         = Auth::guard('pembeli')->id();
      $Pembeli      = Pembeli::where('id', $user)->first();
      if( $user != NULL) {
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();
      } else {
        $UserCart = [];
      }
      $soldout        = $request->sold;
      $ready          = $request->ready;
      $minimum        = $request->min;
      $maximum        = $request->max;
      if ($soldout == 'on' && $ready == 'on') {
        $all_products = Produk::orderBy('created_at','desc')->paginate(9);
        if ($minimum != null && $maximum != null) {
          $all_products = Produk::where('harga', '>=', $minimum)->where('harga', '<=', $maximum)->orderBy('created_at','desc')->paginate(9);
        } elseif ($maximum != null && $minimum == null) {
          $all_products = Produk::where('harga', '<=', $maximum)->orderBy('created_at','desc')->paginate(9);
        } elseif ($minimum != null && $maximum == null) {
          $all_products = Produk::where('harga', '>=', $minimum)->orderBy('created_at','desc')->paginate(9);
        }
      } elseif($ready == 'on' && $soldout != 'on') {
        $all_products = Produk::where('status', 'Siap')->orderBy('created_at','desc')->paginate(9);
        if ($minimum != null && $maximum != null) {
          $all_products = Produk::where('status', 'Siap')->where('harga', '>=', $minimum)->where('harga', '<=', $maximum)->orderBy('created_at','desc')->paginate(9);
        } elseif ($maximum != null && $minimum == null) {
          $all_products = Produk::where('status', 'Siap')->where('harga', '<=', $maximum)->orderBy('created_at','desc')->paginate(9);
        } elseif ($minimum != null && $maximum == null) {
          $all_products = Produk::where('status', 'Siap')->where('harga', '>=', $minimum)->orderBy('created_at','desc')->paginate(9);
        }
      } elseif ($soldout == 'on' && $ready != 'on') {
        $all_products = Produk::where('status', 'Tidak Siap')->orderBy('created_at','desc')->paginate(9);
        if ($minimum != null && $maximum != null) {
          $all_products = Produk::where('status', 'Tidak Siap')->where('harga', '>=', $minimum)->where('harga', '<=', $maximum)->orderBy('created_at','desc')->paginate(9);
        } elseif ($maximum != null && $minimum == null) {
          $all_products = Produk::where('status', 'Tidak Siap')->where('harga', '<=', $maximum)->orderBy('created_at','desc')->paginate(9);
        } elseif ($minimum != null && $maximum == null) {
          $all_products = Produk::where('status', 'Tidak Siap')->where('harga', '>=', $minimum)->orderBy('created_at','desc')->paginate(9);
        }
      } elseif ($soldout != 'on' && $ready != 'on') {
        $all_products = Produk::orderBy('created_at','desc')->paginate(9);
        if ($minimum != null && $maximum != null) {
          $all_products = Produk::where('harga', '>=', $minimum)->where('harga', '<=', $maximum)->orderBy('created_at','desc')->paginate(9);
        } elseif ($maximum != null && $minimum == null) {
          $all_products = Produk::where('harga', '<=', $maximum)->orderBy('created_at','desc')->paginate(9);
        } elseif ($minimum != null && $maximum == null) {
          $all_products = Produk::where('harga', '>=', $minimum)->orderBy('created_at','desc')->paginate(9);
        }
      }
      
      return view('frontend.pages.product.all-products', compact('kategori', 'all_products','new_products', 'UserCart'));
    }
}
