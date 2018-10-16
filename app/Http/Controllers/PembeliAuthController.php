<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\PembeliAuth as Pembeli;
use App\Kategori;
use App\Produk;

class PembeliAuthController extends Controller
{

    public function index()
    {
        $id = Auth::guard('pembeli')->id();
        $user = Pembeli::where('id', $id)->first();
        $kategori = Kategori::all();
        $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
        return view('frontend.pages.account.index',compact('user', 'kategori', 'new_products'));
    }

    public function showRegisterForm()
    {
      $kategori = Kategori::all();
      $all_products = Produk::limit(8)->orderBy('id','ASC')->get();
        return view('frontend.pages.auth.register',compact('kategori','all_products'));
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
      $kategori = Kategori::all();
      $all_products = Produk::limit(8)->orderBy('id','ASC')->get();
        return view('frontend.pages.auth.login',compact('kategori','all_products'));
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
