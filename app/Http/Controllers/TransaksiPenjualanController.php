<?php

namespace App\Http\Controllers;

use App\TransaksiPenjualan as Penjualan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pembeli;
use Validator;

class TransaksiPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        dd($request);
        $validator = Validator::make($request->all(), [
            'kode_transaksi' => 'required',
            'kode_keranjang' => 'required',
            'kode_pembeli' => 'required',
            'ongkir' => 'required|numeric',
            'grand_total' => 'required|numeric',
            'status' => 'required|in:Order',
            'keterangan' => 'required',
        ]);
        $userID = Auth::guard('pembeli')->id();
        $pembeli = Pembeli::where('id', $userID)->first();
        $countTransaction = Penjualan::where('kode_pembeli', $pembeli->kode_pembeli)->count() + 1;
        $code = 'TR-'.$userID.$countTransaction;
        $data = Penjualan::create([
            'kode_transaksi_penjualan' => $code,
            'kode_keranjang' => $request->kode_keranjang,
            'kode_pembeli'  => $pembeli->kode_pembeli,
            'ongkir'        => $request->ongkir,
            'grand_total'   => $request->grand_total,
            'tanggal'       => date('Y-m-d'),
            'status'        => 'Order',
            'keterangan'    => $request->keterangan,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiPenjualan  $transaksiPenjualan
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiPenjualan $transaksiPenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiPenjualan  $transaksiPenjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiPenjualan $transaksiPenjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiPenjualan  $transaksiPenjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiPenjualan $transaksiPenjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiPenjualan  $transaksiPenjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiPenjualan $transaksiPenjualan)
    {
        //
    }
}
