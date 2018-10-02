<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index() {
      $data = User::all();
          return view('Backend.User.DataUser',compact('data'));
    }
    public function create() {
        //
    }
    public function store(Request $request){
        //
    }
    public function show($id) {
        //
    }
    public function edit($id) {
        //
    }
    public function update(Request $request, $id) {
        //
    }
    public function destroy($id) {
        //
    }
}
