<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
class UserController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }
    public function index() {
      $data = User::orderBy('id','desc')->get();
          return view('Backend.User.DataUser',compact('data'));
    }
    public function store(Request $request){
      $data = User::select('email')->first();
      if ($request->email == $data->email) {
        return redirect()->back()->with('fatal','Email sudah di gunakan');
      }
      elseif ($request->password == $request->password_confirmation) {
      $code = User::count()+1;
      $date = date('Ymdhi');
      $foto = $request->foto;
      $GetExtension = $foto->getClientOriginalExtension();
      $path = $foto->storeAs('public/images', 'Us-'.$date.$code . '.' . $GetExtension);
      $insert = new User;
      $insert->kode_user='Us-'.$date.$code;
      $insert->name=$request->name;
      $insert->email=$request->email;
      $insert->password= Hash::make($request->password);
      $insert->alamat=$request->alamat;
      $insert->status=$request->status;
      $insert->jabatan=$request->jabatan;
      $insert->foto=$path;
      $insert->save();
      return redirect()->back()->with('success','User berhasil di tambahkan');
      }
      else {
        return redirect()->back();
      }
    }
    public function nonAktif(Request $request, $kode_user) {
        $nonAktif = User::where('kode_user',$kode_user)->first();
        $nonAktif->status=$request->status;
        $nonAktif->save();
        return redirect()->back()->with('success','User berhasil di aktifkan');
    }
    public function Aktif(Request $request, $kode_user) {
      $Aktif = User::where('kode_user',$kode_user)->first();
      $Aktif->status=$request->status;
      $Aktif->save();
      return redirect()->back()->with('success','User berhasil di nonAktifkan');
    }
    public function update(Request $request, $kode_user) {
      $validator = Validator::make($request->all(), [
          'email' => 'required|unique:users,email,'.$request->id,
      ]);
      if ($validator->fails()) {
          return redirect()->back()->with('fatal', 'Gagal');
      }
      if ($request->password != $request->password_confirmation) {
        return redirect()->back()->with('fatal','password yang anda masukan tidak sama');
      }elseif ($request->foto == '' && $request->password == '' ) {
        $update = User::where('kode_user',$kode_user)->first();
        $update->name = $request->name;
        $update->email = $request->email;
        $update->jabatan = $request->jabatan;
        $update->alamat = $request->alamat;
        $update->save();
        return redirect()->back()->with('success','User berhasil di update');
      }elseif ($request->password == '') {
        $foto = $request->foto;
        $GetExtension = $foto->getClientOriginalExtension();
        $path = $foto->storeAs('public/images', $kode_user . '.' . $GetExtension);
        $update = User::where('kode_user',$kode_user)->first();
        $update->name = $request->name;
        $update->email = $request->email;
        $update->jabatan = $request->jabatan;
        $update->alamat = $request->alamat;
        $update->foto = $path;
        $update->save();
        return redirect()->back()->with('success','User berhasil di update');
      } elseif ($request->foto == '') {
        $update = User::where('kode_user',$kode_user)->first();
        $update->name = $request->name;
        $update->email = $request->email;
        $update->jabatan = $request->jabatan;
        $update->alamat = $request->alamat;
        $update->password = Hash::make($request->password);
        $update->save();
        return redirect()->back()->with('success','User berhasil di update');
      } else {
        $foto = $request->foto;
        $GetExtension = $foto->getClientOriginalExtension();
        $path = $foto->storeAs('public/images', $kode_user . '.' . $GetExtension);
        $update = User::where('kode_user',$kode_user)->first();
        $update->name = $request->name;
        $update->email = $request->email;
        $update->jabatan = $request->jabatan;
        $update->password = Hash::make($request->password);
        $update->alamat = $request->alamat;
        $update->foto = $path;
        $update->save();
        return redirect()->back()->with('success','User berhasil di update');
      }
    }
    public function destroy($kode_user) {
      $delete = User::Where('kode_user', $kode_user);
      $delete->delete();
      return redirect()->back()->with('success','User berhasil di delete');
    }
}
