<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\TransaksiPenjualan as Penjualan;
use App\PembeliAuth as Pembeli;
use App\Keranjang;
use App\Kategori;
use App\Promo;
use App\Produk;
use App\Alamat;
use Validator;

class PembeliAuthController extends Controller
{

    public function index()
    {
        $id             = Auth::guard('pembeli')->id();
        $user           = Pembeli::where('id', $id)->first();
        $UserCart       = Keranjang::where('kode_pembeli', $user->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        $kategori       = Kategori::all();
        $showPromo      = Promo::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $point          = Penjualan::where('kode_pembeli', $user->kode_pembeli)->where('grand_total', '>=', 300000)->count();
        $orders         = Penjualan::where('kode_pembeli', $user->kode_pembeli)->limit(3)->orderBy('tanggal', 'desc')->get();
        return view('frontend.pages.account.index',compact('showPromo','user', 'point', 'orders', 'kategori', 'new_products', 'all_products', 'UserCart'));
    }

    public function showRegisterForm()
    {
      $kategori     = Kategori::all();
      $all_products = Produk::orderBy('created_at','desc')->get();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $user         = Auth::guard('pembeli')->id();
      $showPromo    = Promo::all();
      $Pembeli      = Pembeli::where('id', $user)->first();
      if( $user != NULL) {
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        } else {
          $UserCart = [];
        }
        return view('frontend.pages.auth.register',compact('showPromo','kategori','all_products', 'new_products', 'UserCart'));
    }

    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'          => 'required|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email'         => 'required|email',
            'pass'          => 'required|max:12',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alertFailRegister', 'Something wrong in your input value. Register failed!');
        } else {
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
            return redirect()->route('pembeli.login')->with('alertSuccessRegister', 'Your account successfully registered. Please login using your account!');
        }
    }

    public function showLoginForm()
    {
      $kategori     = Kategori::all();
      $all_products = Produk::orderBy('created_at','desc')->get();
      $new_products = Produk::limit(4)->orderBy('created_at','desc')->get();
      $user         = Auth::guard('pembeli')->id();
      $showPromo    = Promo::all();
      $Pembeli      = Pembeli::where('id', $user)->first();
      if( $user != NULL) {
        $UserCart = Keranjang::where('kode_pembeli', $Pembeli->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        } else {
          $UserCart = [];
        }
      return view('frontend.pages.auth.login',compact('showPromo','kategori','all_products', 'new_products', 'UserCart'));
    }

    public function Login(Request $request)
    {
        $user   = Pembeli::where('email', $request->email)->first();
        $check  = Auth::guard('pembeli')->attempt(request(['email', 'password']));
        if ( $check and $user->deleted_at == '' ) {
          Auth::guard('pembeli')->login($user);
          return redirect()->route('frontend.home');;
        } else {
            return redirect()->back()->with('alertFailLogin', 'Something wrong in your input value. Please try again!');
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
        $showPromo      = Promo::all();
        $user           = Pembeli::where('id', $id)->first();
        $UserCart       = Keranjang::where('kode_pembeli', $user->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        return view('frontend.pages.account.editaccount',compact('showPromo','UserCart', 'user', 'alamat', 'kategori', 'all_products', 'new_products'));
    }

    public function EditPassword()
    {
        $kategori       = Kategori::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $id             = Auth::guard('pembeli')->id();
        $showPromo      = Promo::all();
        $user           = Pembeli::where('id', $id)->first();
        $UserCart       = Keranjang::where('kode_pembeli', $user->kode_pembeli)->where('status', 'Pending')->where('status', 'Pending')->with('detailProduct')->get();
        return view('frontend.pages.account.change_password',compact('showPromo','UserCart', 'user', 'kategori', 'all_products', 'new_products'));
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
            return redirect()->back()->with('alertFailProfile', 'Something wrong in your input value. No data changed!');
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
        $showPromo = Promo::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $id             = Auth::guard('pembeli')->id();
        $user           = Pembeli::where('id', $id)->first();
        $UserCart       = Keranjang::where('kode_pembeli', $user->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        $address        = Alamat::where('kode_pembeli', $user->kode_pembeli)->get();
        $no             = 1;
        return view('frontend.pages.account.address',compact('showPromo','UserCart', 'user', 'address', 'no', 'kategori', 'all_products', 'new_products'));
    }

    public function GetProvince()
    {
        // GET API FROM RAJA ONGKIR
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL               => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER    => true,
          CURLOPT_ENCODING          => "",
          CURLOPT_MAXREDIRS         => 10,
          CURLOPT_TIMEOUT           => 30,
          CURLOPT_HTTP_VERSION      => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST     => "GET",
          CURLOPT_HTTPHEADER        => array(
            "key: 9e75f7010c470ab9611072c4444605be"
          ),
        ));
        $response   = curl_exec($curl);
        $decode     = json_decode($response, true);
        $province   = $decode['rajaongkir']['results'];
        return $province;
    }

    public function GetCity($id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL               => "https://api.rajaongkir.com/starter/city?province=$id",
          CURLOPT_RETURNTRANSFER    => true,
          CURLOPT_ENCODING          => "",
          CURLOPT_MAXREDIRS         => 10,
          CURLOPT_TIMEOUT           => 30,
          CURLOPT_HTTP_VERSION      => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST     => "GET",
          CURLOPT_HTTPHEADER        => array(
            "key: 9e75f7010c470ab9611072c4444605be"
          ),
        ));
        $response   = curl_exec($curl);
        $decode     = json_decode($response, true);
        $city       = $decode['rajaongkir']['results'];
        return $city;
    }

    public function AddAddress(Request $request)
    {
        $get_auth_id    = Auth::guard('pembeli')->id();
        $get_pembeli    = Pembeli::where('id', $get_auth_id)->first();
        $get_max_id     = Alamat::max('id') + 1;
        $validator      = Validator::make($request->all(), [
            'nama_alamat' => 'required',
            'id_provinsi' => 'required',
            'provinsi'    => 'required',
            'id_kota'     => 'required',
            'kota'        => 'required',
            'alamat'      => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alertFailAddAddress', 'Something wrong in your input value. No data added!');
        } else {
                $add    = Alamat::create([
                    'kode_pembeli'  => $get_pembeli->kode_pembeli,
                    'kode_alamat'   => 'ALMT'. date('ymdhis') . $get_max_id,
                    'nama_alamat'   => $request->nama_alamat,
                    'alamat'        => $request->alamat,
                    'id_provinsi'   => $request->id_provinsi,
                    'provinsi'      => $request->provinsi,
                    'id_kota'       => $request->id_kota,
                    'kota'          => $request->kota,
                ]);

            return redirect()->back()->with('alertSuccessAddAddress', 'Your address successfully added!');
        }
    }

    public function EditAddress($code)
    {
        $kategori       = Kategori::all();
        $showPromo      = Promo::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $id             = Auth::guard('pembeli')->id();
        $user           = Pembeli::where('id', $id)->first();
        $UserCart       = Keranjang::where('kode_pembeli', $user->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        $address        = Alamat::where('kode_alamat', $code)->first();

        return view('frontend.pages.account.detail_address',compact('showPromo','UserCart','address', 'user', 'id', 'new_products', 'all_products', 'kategori'));
    }

    public function UpdateAddress(Request $request, $code)
    {
        $validator      = Validator::make($request->all(), [
            'nama_alamat' => 'required',
            'id_provinsi' => 'required',
            'provinsi'  => 'required',
            'id_kota'   => 'required',
            'kota'      => 'required',
            'alamat'    => 'required',
            ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alertFailUpdateAddress', 'Something wrong in your input value. No data changed!');
        } else {
            $update    = Alamat::where('kode_alamat', $code)->update([
                'nama_alamat'   => $request->nama_alamat,
                'alamat'        => $request->alamat,
                'id_provinsi'   => $request->id_provinsi,
                'provinsi'      => $request->provinsi,
                'id_kota'       => $request->id_kota,
                'kota'          => $request->kota,
            ]);
            return redirect()->back()->with('alertSuccessUpdateAddress', 'Your address successfully updated!');
        }
    }
    public function DeleteAddress($code)
    {
        Alamat::where('kode_alamat', $code)->delete();
        return redirect()->back()->with('alertSuccessDeleteAddress', 'Your address successfully deleted!');
    }

    public function OrderHistory()
    {
        $id             = Auth::guard('pembeli')->id();
        $user           = Pembeli::where('id', $id)->first();
        $kategori       = Kategori::all();
        $showPromo      = Promo::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $UserCart       = Keranjang::where('kode_pembeli', $user->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        $orders         = Penjualan::where('kode_pembeli', $user->kode_pembeli)->orderBy('tanggal', 'desc')->with('GetDetail')->get();
        return view('frontend.pages.account.history',compact('showPromo','UserCart', 'orders', 'new_products', 'all_products', 'kategori', 'user'));
    }

    public function ShowOrderHistory($code)
    {
        $id             = Auth::guard('pembeli')->id();
        $user           = Pembeli::where('id', $id)->first();
        $UserCart       = Keranjang::where('kode_pembeli', $user->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        $kategori       = Kategori::all();
        $showPromo      = Promo::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $orders         = Penjualan::where('kode_pembeli', $user->kode_pembeli)->where('kode_keranjang', $code)->with('GetDetail')->with('getAddress')->first();
        $Items          = Keranjang::where('kode_keranjang', $code)->get();
        foreach ($Items as $item) {
            $hargaUSD[$item->kode_produk] = $item->detailProduct->harga / 15000;
        }
        $ongkir         = $orders->ongkir / 15000;
        $SUM            = $Items->sum('sub_total');
        return view('frontend.pages.account.order',compact('showPromo','SUM', 'hargaUSD', 'Items', 'ongkir', 'orders', 'UserCart', 'new_products', 'all_products', 'kategori'));
    }

    public function MyOrder()
    {
        $id             = Auth::guard('pembeli')->id();
        $user           = Pembeli::where('id', $id)->first();
        $kategori       = Kategori::all();
        $showPromo      = Promo::all();
        $all_products   = Produk::orderBy('created_at','desc')->get();
        $new_products   = Produk::limit(4)->orderBy('created_at','desc')->get();
        $UserCart       = Keranjang::where('kode_pembeli', $user->kode_pembeli)->where('status', 'Pending')->with('detailProduct')->get();
        $orders         = Penjualan::where('kode_pembeli', $user->kode_pembeli)->orderBy('id', 'desc')->where('status', '!=', 'Received')->with('GetDetail')->get();
        return view('frontend.pages.account.my_order', compact('showPromo','UserCart', 'orders', 'new_products', 'all_products', 'kategori', 'user'));
    }

    public function paidOrder($code)
    {
        $Penjualan  =   Penjualan::where('kode_keranjang', $code)->update([
            'status' => 'Paid',
        ]);
        return redirect()->back();
    }
}
