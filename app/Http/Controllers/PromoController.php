<?php

namespace App\Http\Controllers;

use App\Promo;
use App\Produk;
use Illuminate\Http\Request;
use Validator;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Promo::orderBy('created_at', 'desc')->with('GetProduk')->get();
        $data_produk = Produk::all();
        $no = 1;

        return view('Backend.Promo.index', compact('data', 'no', 'data_produk'));
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
        $validator = Validator::make($request->all(), [
            'kode_promo' => 'required|max:20',
            'nama_promo' => 'required|max:20',
            'kode_produk' => 'required',
            'min' => 'required',
            'max' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
        ]);
        $check = Promo::where('kode_promo', $request->kode_promo)->exists();
        if ($validator->fails()) {
            return redirect()->back()->with('alertfail', 'Gagal');
        } 
        elseif ($check) {
            return redirect()->back()->with('alertfail', 'Gagal');
        }
        else {
            $create = Promo::create([
                'kode_promo' => $request->kode_promo,
                'nama_promo' => $request->nama_promo,
                'kode_produk' => $request->kode_produk,
                'min' => $request->min,
                'max' => $request->max,
                'tanggal_awal' => $request->tanggal_awal,
                'tanggal_akhir' => $request->tanggal_akhir,
                'jenis_promo'=>$request->jenis_promo,
                'diskon'=>$request->diskon,
                'kode_produk_bonus'=>$request->kode_produk_bonus,
            ]);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        $validator = Validator::make($request->all(), [
            'kode_promo' => 'required|max:20',
            'nama_promo' => 'required|max:20',
            'kode_produk' => 'required',
            'min' => 'required',
            'max' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alertfail', 'Gagal');
        }
        else {
            $create = Promo::where('kode_promo', $code)->update([
                'nama_promo' => $request->nama_promo,
                'kode_produk' => $request->kode_produk,
                'min' => $request->min,
                'max' => $request->max,
                'tanggal_awal' => $request->tanggal_awal,
                'tanggal_akhir' => $request->tanggal_akhir,
                'jenis_promo'=>$request->jenis_promo,
                'diskon'=>$request->diskon,
                'kode_produk_bonus'=>$request->kode_produk_bonus,
            ]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $data = Promo::where('kode_promo', $code)->first();
        $data->delete();

        return redirect()->back();
    }
}
