<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjangs';
    protected $primarykey = 'id';
    protected $fillable = ['id','kode_keranjang','kode_pembeli','kode_produk'];


    public function detailProduct()
	{
		return $this->belongsTo('App\Produk','kode_produk','kode_produk');
	}
}
