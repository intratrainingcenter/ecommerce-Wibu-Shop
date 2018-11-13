<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembeli extends Model
{
  use SoftDeletes;

  protected $table = 'pembelis';
  protected $primarykey = 'id';
  protected $fillable = ['kode_pembeli', 'nama_pembeli', 'alamat', 'jenis_kelamin', 'email', 'password', 'foto'];
  protected $dates = ['deleted_at'];
}
