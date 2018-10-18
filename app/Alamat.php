<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    public function GetPembeli()
    {
        return $this->belongsTo('App\Pembeli', 'kode_pembeli', 'kode_pembeli');
    }
}
