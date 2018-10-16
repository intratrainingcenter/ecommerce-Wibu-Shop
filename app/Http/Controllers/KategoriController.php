<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $data = Kategori::orderBy('created_at', 'DESC')->get();
            return view('Backend.Kategori.index', compact('data'));

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
        $code = date("Ymdhis");
        $count = kategori::count()+1;
        $check = kategori::where('nama_kategori',$request->nama_kategori)->doesntExist();

        if($check == true){
             $insert = new Kategori;
             $insert->kode_kategori='K'.$code.$count;
             $insert->nama_kategori=$request->nama_kategori;
             $insert->keterangan=$request->keterangan;
             $insert->save();

             return redirect()->back()->with(['success'=> 'Berhasil Menambahkan Kategori Produk']);
        }else{
            return redirect()->back()->with(['edit'=> 'Kategori Produk Sudah Ada']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$kode_kategori)
    {
      
        $check = Kategori::where('nama_kategori',$request->nama_kategori)->doesntExist();

        if($check == true){
            $Update = Kategori::where('kode_kategori',$request->kode_kategori)->first();
            $Update->kode_kategori=$request->kode_kategori;
            $Update->nama_kategori=$request->nama_kategori;
            $Update->keterangan=$request->keterangan;
            $Update->save();

            return redirect()->back()->with(['success'=> 'Berhasil mengedit Kategori Produk']);
        }else{
            return redirect()->back()->with(['edit'=> 'Kategori Produk Sudah Ada']);
          }
      }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_kategori)
    {
        $Delete = Kategori::where('kode_kategori',$kode_kategori)->first();
        $Delete->delete();

        return redirect('kategori')->with(['success'=>'Berhasil Menghapus Kategori ']);
    }
}
