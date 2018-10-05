<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['id', 'kode_kategori', 'nama_kategori', 'keterangan'];
}

