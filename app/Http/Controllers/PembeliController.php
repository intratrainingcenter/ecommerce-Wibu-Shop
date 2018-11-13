<?php

namespace App\Http\Controllers;

use App\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Pembeli::orderBy('created_at', 'desc')->get();
      $no = 1;
      return view('Backend.Pembeli.index', compact('data', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $data = Pembeli::onlyTrashed()->orderBy('created_at', 'desc')->get();
      $no = 1;
      return view('Backend.Pembeli.nonActive', compact('data', 'no'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembeli $pembeli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      $data = Pembeli::withTrashed()->where('kode_pembeli', $id)->first();
      $data->restore();

      return redirect()->back()->with('alertsuccess', 'Data '.$data->nama_pembeli.' Berhasil Restore');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = Pembeli::where('kode_pembeli', $id)->first();
      $data->delete();

      return redirect()->back()->with('alertsuccess', 'Data '.$data->nama_pembeli.' Berhasil Dihapus');
    }
}
