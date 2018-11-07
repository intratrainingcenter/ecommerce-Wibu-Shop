<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembeli extends Model
{
  use SoftDeletes;

  protected $table = 'pembelis';
  protected $primarykey = 'id';
  protected $fillable = ['id','kode_pembeli'];
  protected $dates = ['deleted_at'];
}
