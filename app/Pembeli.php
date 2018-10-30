<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
  protected $table = 'pembelis';
  protected $primarykey = 'id';
  protected $fillable = ['id','kode_pembeli'];
}
