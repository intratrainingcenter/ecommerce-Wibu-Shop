<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reviewProduct extends Model
{
    protected $table = 'review_products';
    protected $fillable = ['kode_produk','nama_pembeli','email_pembeli','review_products'];
}
