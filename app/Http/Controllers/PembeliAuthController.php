<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\PembeliAuth as Pembeli;
use App\Kategori;
use App\Produk;
use App\Keranjang;

class PembeliAuthController extends Controller
{

    public function index()
    {
        $id = Auth::guard('pembeli')->id();
        $user = Pembeli::where('id', $id)->first();
        $UserCart = Keranjang::where('kode_pembeli', $id->kode_pembeli)->with('detailProduct')->get();
          return view('frontend.pages.account.index',compact('user','UserCart'));
    }

    public function showRegisterForm()
    {
      $user = Auth::guard('pembeli')->id();
      $Pembeli = Pembeli::where('id', $user)->first();
      $kategori = Kategori::all();
      $all_products = Produk::limit(8)->orderBy('id','ASC')->get();
      if( $user != NULL){
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();
      }else {
          $UserCart = [];
        }
        return view('frontend.pages.auth.register',compact('kategori','all_products','UserCart'));
    }

    public function Register(Request $request)
    {
        $getMaxID = Pembeli::max('id') + 1;
        $getCode = 'PMB' . date('ymdhis') . $getMaxID;
        $register = Pembeli::create([
            'kode_pembeli' => $getCode,
            'nama_pembeli' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'       => $request->alamat,
            'email'        => $request->email,
            'password'     => Hash::make($request->pass),
            'foto'         => '',
        ]);
        return redirect()->route('pembeli.login');
    }

    public function showLoginForm()
    {
      $user = Auth::guard('pembeli')->id();
      $Pembeli = Pembeli::where('id', $user)->first();
      $kategori = Kategori::all();
      $all_products = Produk::limit(8)->orderBy('id','ASC')->get();
      if( $user != NULL){
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();
      }else {
          $UserCart = [];
        }
        return view('frontend.pages.auth.login',compact('kategori','all_products','UserCart'));
    }

    public function Login(Request $request)
    {
        $user = Pembeli::where('email', $request->email)->first();
        $check = Auth::guard('pembeli')->attempt(request(['email', 'password']));
        if ( $check ) {
            Auth::guard('pembeli')->login($user);
            return redirect('/');
        } else {
            return 'gagal';
        }
    }

    public function Logout()
    {
        if (Auth::guard('pembeli')->check()) {
            Auth::guard('pembeli')->logout();
        }

        return redirect()->route('pembeli.login');
    }
}
