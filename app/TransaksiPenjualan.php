<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    public function GetDetail()
    {
        return $this->belongsTo('App\Keranjang', 'kode_keranjang', 'kode_keranjang');
    }
}
