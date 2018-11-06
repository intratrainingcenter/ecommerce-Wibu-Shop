<?php

namespace App\Http\Controllers;

use App\TransaksiPembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TransaksiPembelianController extends Controller
{
    public function index()  {
        $Pembelian = DB::table('transaksi_pembelians')->max('id');
        $Max= $Pembelian+1;
        $date = date('mdhi');
        $idUser = Auth::user()->id;
        $code = 'TRB-'.$Max.$date.$idUser;
        $Product = DB::table('produks')->get();
        return view('Backend.pembelianProduct.tambahStock',compact('Product','code'));
    }

    public function tambah(Request $request,$kode)  {
        $ShowProduct = DB::table('produks')->select('hpp')->where('kode_produk',$kode)->get();
        return Response()->json( $ShowProduct );
    }

    public function tampilOpsi(Request $request)  {
        $opsiPembelian = DB::table('transaksi_pembelians')
                              ->where('kode_transaksi_pembelian',$request->kodePembelian)
                              ->where('kode_produk',$request->kodebarang)
                              ->first();
        if ($opsiPembelian != null ) {
          $updatejumlah = TransaksiPembelian::where('kode_transaksi_pembelian',$request->kodePembelian)
                                        ->where('kode_produk',$request->kodebarang)->update([
              'jummlah' => $opsiPembelian->jummlah+$request->stock,
              'sub_total' => $opsiPembelian->sub_total+$request->subtotal,
          ]);
        }else {
          $insert = new TransaksiPembelian();
          $insert->kode_transaksi_pembelian=$request->kodePembelian;
          $insert->kode_produk=$request->kodebarang;
          $insert->kode_user=$request->kodeUser;
          $insert->jummlah=$request->stock;
          $insert->harga=$request->harga;
          $insert->sub_total=$request->subtotal;
          $insert->save();
        }
    }

    public function loadOpsi(Request $request)  {
      $kode = $request->param1;
      $loadopsi = TransaksiPembelian::join('produks','produks.kode_produk','=','transaksi_pembelians.kode_produk')
                          ->where('kode_transaksi_pembelian', $kode)
                          ->select('transaksi_pembelians.*','produks.*','transaksi_pembelians.id as idtransaksi')
                          ->orderBy('idtransaksi','DESC')->get();
      return view('Backend.pembelianProduct.loadOpsi', compact('loadopsi'));
    }
    public function hapusOpsi(Request $request)  {
        $delete = TransaksiPembelian::where('id',$request->id)->first();
        $delete->delete();
        return Response()->json($delete);
    }
    public function pengajuan(Request $request)  {
        // dd($request->all());
        $pengajuan = TransaksiPembelian::where('kode_transaksi_pembelian',$request->kode);
        $pengajuan->status = "Pengajuan";
        $pengajuan->save();
        return response()->json($pengajuan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiPembelian  $transaksiPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiPembelian $transaksiPembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiPembelian  $transaksiPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiPembelian $transaksiPembelian)
    {
        //
    }
}
