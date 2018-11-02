<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpsiPromo extends Model
{
    protected $fillable = ['kode_promo','kode_produk'];

    public function GetProduk()
    {
        return $this->belongsTo('App\Produk', 'kode_produk', 'kode_produk');
    }
}
