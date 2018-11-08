<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
  protected $table = 'pembelis';
  protected $primarykey = 'id';
  protected $fillable = ['kode_pembeli', 'nama_pembeli', 'alamat', 'jenis_kelamin', 'email', 'password', 'foto'];
}
