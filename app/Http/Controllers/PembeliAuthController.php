<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\PembeliAuth as Pembeli;

class PembeliAuthController extends Controller
{

    public function Register(Request $request)
    {
        $getMaxID = Pembeli::max('id') + 1;
        $getCode = 'PMB' . date('ymdhis') . $getMaxID;
        $register = Pembeli::create([
            'kode_pembeli' => $getCode,
            'nama_pembeli' => $request->nama,
            'alamat'       => $request->alamat,
            'email'        => $request->email,
            'password'     => Hash::make($request->pass),
            'foto'         => 'foto.jpg',
        ]);
        return redirect()->route('pembeli.login');

    }

    public function Login(Request $request)
    {
        // $user = Pembeli::where('email', $request->email)->first();
        // $check = Hash::check($request->password, $user->password);
        $check = Auth::guard('pembeli')->attempt(request(['email', 'password']));
        dd($check);
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