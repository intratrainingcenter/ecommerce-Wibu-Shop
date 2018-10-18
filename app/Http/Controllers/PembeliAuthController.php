<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\TransaksiPenjualan as Penjualan;
use App\PembeliAuth as Pembeli;
use App\Kategori;
use App\Produk;
use App\Alamat;
use Validator;

class PembeliAuthController extends Controller
{

    public function index()
    {
        $id             = Auth::guard('pembeli')->id();
        $user           = Pembeli::where('id', $id)->first();
        $kategori       = Kategori::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $point          = Penjualan::where('kode_pembeli', $user->kode_pembeli)->count();
        $orders         = Penjualan::where('kode_pembeli', $user->kode_pembeli)->limit(3)->get();
        return view('frontend.pages.account.index',compact('user', 'point', 'orders', 'kategori', 'new_products', 'all_products'));
    }

    public function showRegisterForm()
    {
      $kategori     = Kategori::all();
      $all_products = Produk::orderBy('created_at','desc')->get();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
        return view('frontend.pages.auth.register',compact('kategori','all_products', 'new_products'));
    }

    public function Register(Request $request)
    {
        $getMaxID   = Pembeli::max('id') + 1;
        $getCode    = 'PMB' . date('ymdhis') . $getMaxID;
        $register   = Pembeli::create([
            'kode_pembeli'  => $getCode,
            'nama_pembeli'  => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email'         => $request->email,
            'password'      => Hash::make($request->pass),
            'foto'          => '',
        ]);
        return redirect()->route('pembeli.login');
    }

    public function showLoginForm()
    {
      $kategori     = Kategori::all();
      $all_products = Produk::orderBy('created_at','desc')->get();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      return view('frontend.pages.auth.login',compact('kategori','all_products', 'new_products'));
    }

    public function Login(Request $request)
    {
        $user   = Pembeli::where('email', $request->email)->first();
        $check  = Auth::guard('pembeli')->attempt(request(['email', 'password']));
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

    public function Edit()
    {
        $kategori       = Kategori::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $id             = Auth::guard('pembeli')->id();
        $user           = Pembeli::where('id', $id)->first();
        return view('frontend.pages.account.editaccount', compact('user', 'alamat', 'kategori', 'all_products', 'new_products'));
    }

    public function EditPassword()
    {
        $kategori       = Kategori::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $id             = Auth::guard('pembeli')->id();
        $user           = Pembeli::where('id', $id)->first();
        return view('frontend.pages.account.change_password', compact('user', 'kategori', 'all_products', 'new_products'));
    }

    public function UpdateProfile(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_pembeli'  => 'required|max:20',
            'jenis_kelamin' => 'required',
            'telepon'       => 'required',
            'foto'          => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alertfail', 'Gagal');
        } else {
            if ($request->hasFile('foto')) {
                $get_pembeli    = Pembeli::where('id', $id)->first();
                Storage::delete($get_pembeli->foto);
                $foto           = $request->foto;  
                $GetExtension   = $foto->getClientOriginalExtension();
                $path           = $foto->storeAs('public/images', $get_pembeli->kode_pembeli . '.' . $GetExtension);
                $update         = Pembeli::where('id', $id)->update([
                    'nama_pembeli'  => $request->nama_pembeli,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'foto'          => $path,
                    'telepon'       => $request->telepon,
                ]);
            } else {
                $update = Pembeli::where('id', $id)->update([
                    'nama_pembeli'  => $request->nama_pembeli,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'telepon'       => $request->telepon,
                ]);
            }
            return redirect()->back();
        }
    }

    public function UpdatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'new_password'  => 'required|max:12',
        ]);
        $pembeli   = Pembeli::where('id', $id)->first();
        $check     = Hash::check($request->password, $pembeli->password);
        if ($validator->fails()) {
            return redirect()->back()->with('alertfail', 'Gagal');
        } else {
            if ($check) {
                if ($request->new_password == $request->confirm_password) {
                    $pembeli->update([
                        'password' => Hash::make($request->new_password)
                    ]);
                    return redirect()->route('account.edit');
                } else {
                    return redirect()->back()->with('alertfail', 'Please confirm your new pasword');
                }
            } else {
                return redirect()->back()->with('alertfail', 'Your current password is wrong!');
            }
        }
        
        
    }
}