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
use App\Keranjang;
use App\Alamat;
use Validator;

class PembeliAuthController extends Controller
{

    public function index()
    {
        $id             = Auth::guard('pembeli')->id();
        $user           = Pembeli::where('id', $id)->first();
        $UserCart       = Keranjang::where('kode_pembeli', $id->kode_pembeli)->with('detailProduct')->get();
        $kategori       = Kategori::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $point          = Penjualan::where('kode_pembeli', $user->kode_pembeli)->count();
        $orders         = Penjualan::where('kode_pembeli', $user->kode_pembeli)->limit(3)->orderBy('tanggal', 'desc')->get();
        return view('frontend.pages.account.index',compact('user', 'point', 'orders', 'kategori', 'new_products', 'all_products', 'UserCart'));
    }

    public function showRegisterForm()
    {
      $kategori     = Kategori::all();
      $all_products = Produk::orderBy('created_at','desc')->get();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $user         = Auth::guard('pembeli')->id();
      if( $user != NULL) {
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();
        } else {
          $UserCart = [];
        }
        return view('frontend.pages.auth.register',compact('kategori','all_products', 'new_products', 'UserCart'));
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
      $user         = Auth::guard('pembeli')->id();
      if( $user != NULL) {
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->with('detailProduct')->get();
        } else {
          $UserCart = [];
        }
      return view('frontend.pages.auth.login',compact('kategori','all_products', 'new_products', 'UserCart'));
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
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email'         => 'required|email',
            'telepon'       => 'required',
            'foto'          => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alertFailProfile', 'Something wrong in your input value. No data Changed!');
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
            return redirect()->back()->with('alertSuccessProfile', 'Your profile successfully updated!');
        }
    }

    public function UpdatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'new_password'  => 'required|max:12',
            'confirm_password' => 'required|max:12',
        ]);
        $pembeli   = Pembeli::where('id', $id)->first();
        $check     = Hash::check($request->password, $pembeli->password);
        if ($validator->fails()) {
            return redirect()->back()->with('alertNewPassword', 'Password must be less than 12 character');
        } else {
            if ($check) {
                if ($request->new_password == $request->confirm_password) {
                    $pembeli->update([
                        'password' => Hash::make($request->new_password)
                    ]);
                    return redirect()->route('account.edit')->with('alertSuccessPassword', 'Password successfully changed!');
                } else {
                    return redirect()->back()->with('alertConfirmPassword', 'Please confirm your new password!');
                }
            } else {
                return redirect()->back()->with('alertWrongPassword', 'Your current password is wrong!');
            }
        }
    }

    public function Address()
    {
        $kategori       = Kategori::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $id             = Auth::guard('pembeli')->id();
        $user           = Pembeli::where('id', $id)->first();
        $address        = Alamat::where('kode_pembeli', $user->kode_pembeli)->get();
        $no             = 1;
        return view('frontend.pages.account.address', compact('user', 'address', 'no', 'kategori', 'all_products', 'new_products'));
    }

    public function GetProvince()
    {
        // GET API FROM RAJA ONGKIR
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: 8b81c63a1553aa8b18c05314ab4f13df"
          ),
        ));
        $response = curl_exec($curl);
        $decode = json_decode($response, true);
        $province = $decode['rajaongkir']['results'];
        return $province;
    }

    public function GetCity($id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$id",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: 8b81c63a1553aa8b18c05314ab4f13df"
          ),
        ));
        $response = curl_exec($curl);
        $decode = json_decode($response, true);
        $city = $decode['rajaongkir']['results'];
        return $city;
    }

    public function AddAddress(Request $request)
    {
        $get_auth_id    = Auth::guard('pembeli')->id();
        $get_pembeli    = Pembeli::where('id', $get_auth_id)->first();
        $get_max_id       = Alamat::max('id') + 1;
        $validator      = Validator::make($request->all(), [
            'id_provinsi' => 'required',
            'provinsi'  => 'required',
            'id_kota'   => 'required',
            'kota'      => 'required',
            'alamat'    => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alertfail', 'Gagal');
        } else {
                $add    = Alamat::create([
                    'kode_pembeli'  => $get_pembeli->kode_pembeli,
                    'kode_alamat'   => 'ALMT'. date('ymdhis') . $get_max_id,
                    'alamat'        => $request->alamat,
                    'id_provinsi'   => $request->id_provinsi,
                    'provinsi'      => $request->provinsi,
                    'id_kota'       => $request->id_kota,
                    'kota'          => $request->kota,
                ]);
            
            return redirect()->back();
        }
    }

    public function EditAddress($code)
    {
        $kategori       = Kategori::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $id             = Auth::guard('pembeli')->id();
        $user           = Pembeli::where('id', $id)->first();
        $address        = Alamat::where('kode_alamat', $code)->first();
        return view('frontend.pages.account.detail_address', compact('address', 'user', 'id', 'new_products', 'all_products', 'kategori'));
    }

    public function UpdateAddress(Request $request, $code)
    {
        $validator      = Validator::make($request->all(), [
            'id_provinsi' => 'required',
            'provinsi'  => 'required',
            'id_kota'   => 'required',
            'kota'      => 'required',
            'alamat'    => 'required',
            ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alertfail', 'Gagal');
        } else {
            $update    = Alamat::where('kode_alamat', $code)->update([
                'alamat'        => $request->alamat,
                'id_provinsi'   => $request->id_provinsi,
                'provinsi'      => $request->provinsi,
                'id_kota'       => $request->id_kota,
                'kota'          => $request->kota,
            ]);
            return redirect()->back();
        }
    }
    public function DeleteAddress($code)
    {
        Alamat::where('kode_alamat', $code)->delete();
        return redirect()->back();
    }
}