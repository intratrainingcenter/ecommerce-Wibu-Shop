<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{

    protected $fillable = ['kode_transaksi_penjualan', 'kode_keranjang', 'kode_pembeli', 'ongkir', 'grand_total', 'tanggal', 'status','kode_alamat','service', 'keterangan'];

    public function GetDetail()
    {
        return $this->belongsTo('App\Keranjang', 'kode_keranjang', 'kode_keranjang');
    }

    public function GetBuyer()
    {
        return $this->belongsTo('App\Pembeli', 'kode_pembeli', 'kode_pembeli');
    }

    public function getAddress()
    {
        return $this->belongsTo('App\Alamat', 'kode_alamat', 'kode_alamat');
    }
}
