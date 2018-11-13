<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{

    protected $fillable = ['kode_pembeli', 'kode_alamat', 'nama_alamat', 'alamat','id_provinsi', 'provinsi','id_kota', 'kota'];
    public function GetPembeli()
    {
        return $this->belongsTo('App\Pembeli', 'kode_pembeli', 'kode_pembeli');
    }
}
