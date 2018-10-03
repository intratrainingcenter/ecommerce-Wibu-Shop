<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::orderBy('created_at', 'desc')->get();
        $no = 1;
        return view('Backend.Produk.index', compact('data', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
                    'kode_produk' => 'required|max:20',
                    'nama_produk' => 'required|max:20',
                    'kode_kategori' => 'required|max:20',
                    'hpp' => 'required|numeric',
                    'harga' => 'required|numeric',
                    'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alertgagal', 'Gagal');
        } else {
            $foto = $request->foto;  
            $GetExtension = $foto->getClientOriginalExtension();
            $path = $foto->storeAs('public/images', $request->kode_produk . '.' . $GetExtension);
            $create = Produk::create([
                'kode_produk' => $request->kode_produk,
                'nama_produk' => $request->nama_produk,
                'kode_kategori' => $request->kode_produk,
                'hpp' => $request->hpp,
                'harga' => $request->harga,
                'foto' => $path,
            ]);
            return redirect()->back();
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_produk' => 'required|max:20',
            'nama_produk' => 'required|max:20',
            'kode_kategori' => 'required|max:20',
            'hpp' => 'required|numeric',
            'harga' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alertgagal', 'Gagal');
        } else {
            if ($request->hasFile('foto')) {
                $get_foto = Produk::where('kode_produk', $id)->first();
                Storage::delete($get_foto->foto);
                $foto = $request->foto;
                $GetExtension = $foto->getClientOriginalExtension();
                $path = $foto->storeAs('public/images', $request->kode_produk . '.' . $GetExtension);
                $update = Produk::where('kode_produk', $id)->update([
                    'kode_produk' => $request->kode_produk,
                    'nama_produk' => $request->nama_produk,
                    'kode_kategori' => $request->kode_produk,
                    'hpp' => $request->hpp,
                    'harga' => $request->harga,
                    'foto' => $path,
                ]);
            } else {
                $update = Produk::where('kode_produk', $id)->update([
                    'kode_produk' => $request->kode_produk,
                    'nama_produk' => $request->nama_produk,
                    'kode_kategori' => $request->kode_produk,
                    'hpp' => $request->hpp,
                    'harga' => $request->harga,
                ]);
            }
            
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produk::where('kode_produk', $id)->first();
        $image_path = $data->foto;
        Storage::delete($image_path);
        $data->delete();

        return redirect()->back();
    }
}
