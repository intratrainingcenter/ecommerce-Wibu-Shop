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
        return redirect()->back();
      }
      elseif ($request->password == $request->password_confirmation) {
      $code = User::count()+1;
      $date = date('Ymdhi');
      $insert = new User;
      $insert->kode_user='Us-'.$date.$code;
      $insert->name=$request->name;
      $insert->email=$request->email;
      $insert->password= Hash::make($request->password);
      $insert->alamat=$request->alamat;
      $insert->status=$request->status;
      $insert->jabatan=$request->jabatan;
      $insert->save();
      return redirect()->back();
      }
      else {
        return redirect()->back();
      }
    }
    public function nonAktif(Request $request, $kode_user) {
        $nonAktif = User::where('kode_user',$kode_user)->first();
        $nonAktif->status=$request->status;
        $nonAktif->save();
        return redirect()->back();
    }
    public function Aktif(Request $request, $kode_user) {
      $Aktif = User::where('kode_user',$kode_user)->first();
      $Aktif->status=$request->status;
      $Aktif->save();
      return redirect()->back();
    }
    public function update(Request $request, $kode_user) {
      if($request->password == '') {
        $update = User::where('kode_user',$kode_user)->first();
        $update->name = $request->name;
        $update->email = $request->email;
        $update->jabatan = $request->jabatan;
        $update->alamat = $request->alamat;
        $update->save();
        return redirect()->back();
      }else {
        $update = User::where('kode_user',$kode_user)->first();
        $update->name = $request->name;
        $update->email = $request->email;
        $update->jabatan = $request->jabatan;
        $update->password = Hash::make($request->password);
        $update->alamat = $request->alamat;
        $update->save();
        return redirect()->back();
      }
    }
    public function destroy($kode_user) {
      $delete = User::Where('kode_user', $kode_user);
      $delete->delete();
      return redirect()->back();
    }
}
