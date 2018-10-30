<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PembeliAuth extends Authenticatable
{
    use Notifiable;
    protected $table = 'pembelis';
    protected $guard = 'pembeli';

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'kode_pembeli', 'nama_pembeli', 'alamat', 'jenis_kelamin', 'email', 'password', 'foto'
    ];

     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
