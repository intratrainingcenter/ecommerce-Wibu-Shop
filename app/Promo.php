<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{

    protected $fillable = ['kode_promo', 'nama_promo', 'kode_produk', 'min', 'max', 'tanggal_awal', 'tanggal_akhir', 'jenis_promo', 'diskon', 'kode_produk_bonus'];

    public function GetProduk()
    {
        return $this->belongsTo('App\Produk', 'kode_produk', 'kode_produk');
    }
}
