<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
      return view('Backend.Dashboard.index');
    }
    // public function Profile($kode_user)
    // {
    //   $data = User::where('kode_user',$kode_user)->get();
    //   dd($data);
    //   return
    // }
}
