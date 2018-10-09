<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class laporankeuanganController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dt=date('Y-m-d');

        $halaman = 'laporan_keuangan';
        $lp_penjualan = DB::table('pengeluarans')
                        ->selectRaw('sum(grand_total) as total')
                        ->where('kode_pengeluaran', 'like', 'TR%')
                        ->where('tgl_transaksi', $dt)
                        ->first();
        // dd($lp_penjualan);
        $lp_retur     = DB::table('returs')
                        ->selectRaw('sum(grand_total) as total')
                        ->where('tgl_retur', $dt)
                        ->first();
        $lp_pembelian = DB::table('pemasukans')
                        ->selectRaw('sum(grand_total) as total')
                        ->where('kode_pemasukan', 'like', 'TR%')
                        ->where('tgl', $dt)
                        ->first();
        $lp_spoil     = DB::table('spoils')
                        ->selectRaw('sum(grand_total) as total')
                        ->where('tgl_spoil', $dt)
                        ->first();
        $lp_opname    = DB::table('opnames')
                        ->selectRaw('sum(grand_total) as total')
                        ->where('tgl_opname', $dt)
                        ->first();

        $debit      = $lp_pembelian->total + $lp_retur->total + $lp_spoil->total + $lp_opname->total;
        $lp_untung  = $lp_penjualan->total - $debit;
        $lp_rugi    = $debit - $lp_penjualan->total;
        // $lp_penjualan1 = $lp_penjualan->sum();
        // $sum = 0;
        //
        // $subtotal_penjualan = $lp_penjualan->sub_total;
        //
        // $sum+=$subtotal_penjualan;

        return View('backend.lp_keuangan.general',compact('halaman','lp_penjualan','lp_retur','lp_pembelian','lp_spoil','lp_opname','lp_untung','lp_rugi'));
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function filter(Request $request)
    {
      $dari = $request->get('dari');
      $sampai = $request->get('sampai');

       $halaman = 'laporan_keuangan';
       $lp_penjualan = DB::table('pengeluarans')->selectRaw('sum(grand_total) as total')->where('kode_pengeluaran', 'like', 'TR%')->whereBetween('created_at', [$dari, $sampai])->first();
       // dd($lp_penjualan);
       $lp_retur     = DB::table('returs')->selectRaw('sum(grand_total) as total')->whereBetween('created_at', [$dari, $sampai])->first();
       $lp_pembelian = DB::table('pemasukans')->selectRaw('sum(grand_total) as total')->where('kode_pemasukan', 'like', 'TR%')->whereBetween('created_at', [$dari, $sampai])->first();
       $lp_spoil     = DB::table('spoils')->selectRaw('sum(grand_total) as total')->whereBetween('created_at', [$dari, $sampai])->first();
       $lp_opname    = DB::table('opnames')->selectRaw('sum(grand_total) as total')->whereBetween('created_at', [$dari, $sampai])->first();
       $debit      = $lp_pembelian->total + $lp_retur->total + $lp_spoil->total + $lp_opname->total;
       $lp_untung  = $lp_penjualan->total - $debit;
       $lp_rugi    = $debit - $lp_penjualan->total;
       // dd($lp_pembelian);

       return View('backend.lp_keuangan.general',compact('halaman','lp_penjualan','lp_retur','lp_pembelian','lp_spoil','lp_opname','lp_untung','lp_rugi'));
    }
}
