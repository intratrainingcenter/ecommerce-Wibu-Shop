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
        $no = 1;
        $data = (object)array(
          'transaksi' => TransaksiPembelian::all()
                        ->sortByDesc('updated_at')
                        ->groupBy('kode_transaksi_pembelian'),
          'users'     => DB::table('users')
                          ->get(),
          'produks'   => DB::table('transaksi_pembelians')
                          ->join('produks', 'produks.kode_produk', '=', 'transaksi_pembelians.kode_produk')
                          ->select('produks.*', 'transaksi_pembelians.jummlah', 'transaksi_pembelians.harga', 'transaksi_pembelians.sub_total', 'transaksi_pembelians.kode_transaksi_pembelian as kode_trans')
                          ->get(),
        );
        return view('Backend.pembelianProduct.index',compact('data','no'));
    }

    public function addPengajuan()  {
        $Pembelian = DB::table('transaksi_pembelians')->max('id');
        $Max= $Pembelian+1;
        $date = date('mdhis');
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
    public function change(Request $request) {

      if ($request->status == 'Pending') {
        TransaksiPembelian::where('kode_transaksi_pembelian',$request->kode)
                          ->update(['status' => 'Pengajuan']);
      } elseif ($request->status == 'Accepted') {
        TransaksiPembelian::where('kode_transaksi_pembelian',$request->kode)
                          ->update(['status' => 'On Proccess']);
      } elseif ($request->status == 'On Proccess') {
        TransaksiPembelian::where('kode_transaksi_pembelian',$request->kode)
                          ->update(['status' => 'Checking']);
      } elseif ($request->status == 'Checking') {
        TransaksiPembelian::where('kode_transaksi_pembelian',$request->kode)
                          ->update(['status' => 'Done']);
      } elseif ($request->status == 'Cancelled') {
        TransaksiPembelian::where('kode_transaksi_pembelian',$request->kode)
                          ->update(['status' => 'Cancelled']);
      } elseif ($request->status == 'Acc') {
        TransaksiPembelian::where('kode_transaksi_pembelian',$request->kode)
                          ->update(['status' => 'Accepted']);
      }

      return redirect()->route('pembelianproducts.index');
    }
    public function FunctionName()
    {
      return redirect()->route('pembelianproducts.index');
    }
}
