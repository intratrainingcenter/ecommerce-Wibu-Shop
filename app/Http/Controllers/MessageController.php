<?php

namespace App\Http\Controllers;

use App\Message;
use App\Pembeli;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $table = Pembeli::all();

        return view('Backend.Messages.message',compact('table'));
    }

    public function showList()
    {
      $table = Pembeli::all();

      return $table->toJson();
    }

    public function showFill($id)
    {
      $table = Pembeli::where('id',$id)->first();

      return $table->toJson();
    }

    public function search(Request $request)
    {
      $table = Pembeli::where('nama_pembeli', 'like','%' . $request->search . '%')->get();

      return $table->toJson();
    }


}
