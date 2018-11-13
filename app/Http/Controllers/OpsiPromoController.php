<?php

namespace App\Http\Controllers;

use App\OpsiPromoTemporary as Temporary;
use App\OpsiPromo;
use App\Promo;
use Illuminate\Http\Request;

class OpsiPromoController extends Controller
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
        $check = Temporary::where([
            'kode_promo' => $request->kode_promo,
            'kode_produk' => $request->kode_produk,
          ])->first();

        if($check == null) {
            $data = Temporary::create([
                'kode_promo'    =>  $request->kode_promo,
                'kode_produk'   =>  $request->kode_produk,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OpsiPromo  $opsiPromo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $jenis_promo = $request->jenis_promo;
        if ($request->jenis_promo == 'Detail') {
            $data = OpsiPromo::with('GetProduk')->where('kode_promo',$request->kode_promo)->get();
        } else {
            $data = Temporary::with('GetProduk')->where('kode_promo',$request->kode_promo)->get();
        }

        return view('Backend.Promo.loadopsi', compact('data', 'jenis_promo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OpsiPromo  $opsiPromo
     * @return \Illuminate\Http\Response
     */
    public function getPromo(Request $request)
    {
        $produck = OpsiPromo::where('kode_produk',$request->param1)->get();
        if ($produck != null) {
            foreach ($produck as $key => $value) {
              $check[] = Promo::where('kode_promo',$value->kode_promo)->where('min','<=',$request->qty)->where('max','>=',$request->qty)->get();
            }
              return $check;
        }
          // return $produck;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OpsiPromo  $opsiPromo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OpsiPromo  $opsiPromo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $type = $request->type;
        if ($type == 'all') {
            Temporary::where('kode_promo',$request->kode_promo)->delete();
        } else {
            Temporary::where('id',$request->id)->delete();
        }
    }
}
