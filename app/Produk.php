<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['kode_produk', 'nama_produk', 'kode_kategori','stok', 'hpp', 'harga', 'foto', 'status', 'keterangan'];
}
