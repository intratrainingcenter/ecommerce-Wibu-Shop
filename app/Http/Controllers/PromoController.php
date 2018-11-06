<?php

namespace App\Http\Controllers;

use App\OpsiPromoTemporary as Temporary;
use App\OpsiPromo;
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
    public function create(Request $request)
    {
        $data = Promo::where('kode_promo', $request->kode_promo)->count();
        return $data;
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
            'min' => 'required',
            'max' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
        ]);
        $check = Promo::where('kode_promo', $request->kode_promo)->exists();
        if ($validator->fails()) {
            $getOpsiTemporary = Temporary::where('kode_promo',$request->kode_promo)->get();
            if($getOpsiTemporary) {
                $deleteOpsiTemporary = Temporary::where('kode_promo',$request->kode_promo)->delete();
            }
            return redirect()->back()->with('alertfail', 'Tolong isi form dengan benar!');
        }
        elseif ($check) {
            $getOpsiTemporary = Temporary::where('kode_promo',$request->kode_promo)->get();
            if($getOpsiTemporary) {
                $deleteOpsiTemporary = Temporary::where('kode_promo',$request->kode_promo)->delete();
            }
            return redirect()->back()->with('alertfail', 'Kode promo yang sama sudah ada!');
        }
        else {
            $getOpsiTemporary = Temporary::where('kode_promo',$request->kode_promo)->get();

            if($getOpsiTemporary){
                foreach ($getOpsiTemporary as $item) {
                    $store = OpsiPromo::create([
                        'kode_promo' => $item->kode_promo,
                        'kode_produk' => $item->kode_produk,
                    ]);
                }

                $deleteOpsiTemporary = Temporary::where('kode_promo',$request->kode_promo)->delete();
            }

            $create = Promo::create([
                'kode_promo' => $request->kode_promo,
                'nama_promo' => $request->nama_promo,
                'min' => $request->min,
                'max' => $request->max,
                'tanggal_awal' => $request->tanggal_awal,
                'tanggal_akhir' => $request->tanggal_akhir,
                'jenis_promo'=>$request->jenis_promo,
                'diskon'=>$request->diskon,
                'kode_produk_bonus'=>$request->kode_produk_bonus,
            ]);

            // Notification
            $Bonus = Produk::where('kode_produk', $request->kode_produk_bonus)->first();

            if($request->diskon != NULL) {
              $content      = array(
                  "en" => "Temukan Diskon Hingga $request->diskon%, Untuk Pembelian Barang dari $request->tanggal_awal Sampai $request->tanggal_akhir"
              );
            } else if($kode_produk_bonus =! NULL) {
              $content      = array(
                  "en" => "Dapatkan $Bonus->nama_produk Gratis, Untuk pembelian barang tertentu!, Buruan Sebelum Kehabisan"
              );

            } else {
              $content      = array(
                  "en" => "Buruan Cek sekarang!!"
              );
            }
            $headings     = array(
                "en" => "Wibu Shop || $request->nama_promo"
            );

            $url     = "localhost:8000/all-products";

            $fields = array(
                'app_id' => "4f816c01-60fc-425e-9c4c-57cd67cffb1b",
                'included_segments' => array('All'),
                'contents' => $content,
                'headings' => $headings,
                'url' => $url,
            );

            $fields = json_encode($fields);
            print("\nJSON sent:\n");
            print($fields);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Authorization: Basic MzdiMGNkNjgtNjQzYS00MmYxLThjYTMtOTExOWE5MGM2MTY2'
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            $response = curl_exec($ch);
            curl_close($ch);

            // return redirect()->back()->with('alertsuccess', 'Data promo berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = Promo::where('kode_promo', $request->kode_promo)->first();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = Promo::where('kode_promo',$request->kode_promo)->first();
        $OpsiPromo = OpsiPromo::where('kode_promo',$data->kode_promo)->get();
        $deleteOpsiTemporary = Temporary::where('kode_promo',$data->kode_promo)->delete();
        foreach ($OpsiPromo as $item) {
            $moveToTemporary = Temporary::create([
            'kode_promo' => $item->kode_promo,
            'kode_produk' => $item->kode_produk,
            ]);
        }

        return $data;
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
            'min' => 'required',
            'max' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alertfail', 'Tolong isi form dengan benar!');
        }
        else {
            $deleteOpsi = OpsiPromo::where('kode_promo',$request->kode_promo)->delete();

            $getOpsiTemporary = Temporary::where('kode_promo',$request->kode_promo)->get();

            foreach ($getOpsiTemporary as $item) {
              $save = OpsiPromo::create([
                'kode_promo' => $item->kode_promo,
                'kode_produk' => $item->kode_produk,
              ]);
            }
            $deleteOpsiTemporary = Temporary::where('kode_promo',$request->kode_promo)->delete();

            $create = Promo::where('kode_promo', $code)->update([
                'nama_promo' => $request->nama_promo,
                'min' => $request->min,
                'max' => $request->max,
                'tanggal_awal' => $request->tanggal_awal,
                'tanggal_akhir' => $request->tanggal_akhir,
                'jenis_promo'=>$request->jenis_promo,
                'diskon'=>$request->diskon,
                'kode_produk_bonus'=>$request->kode_produk_bonus,
            ]);
        }
    }

    public function UpdateSuccess()
    {
        return redirect()->route('promo.index')->with('alertsuccess', 'Data promo berhasil diubah!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $data = Promo::where('kode_promo', $code)->delete();
        $Opsi = OpsiPromo::where('kode_promo', $code)->delete();
        $OpsiTemporary = Temporary::where('kode_promo', $code)->get();
        if($OpsiTemporary) {
            Temporary::where('kode_promo', $code)->delete();
        }

        return redirect()->back()->with('alertsuccess', 'Data promo berhasil dihapus!');
    }
}
