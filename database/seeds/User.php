<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          [  'kode_user' => 'USR01',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => hash::make('123123'),
            'alamat'  => 'Jakarta',
            'status'    => 'nonAktif',
            'jabatan'    => 'Admin',
        ],[  'kode_user' => 'USR03',
          'name' => 'Owner',
          'email' => 'Owner@gmail.com',
          'password' => hash::make('123123'),
          'alamat'  => 'Jakarta',
          'status'    => 'nonAktif',
          'jabatan'    => 'Owner',
      ],[
            'kode_user' => 'USR02',
            'name' => 'Spv',
            'email' => 'Spv@gmail.com',
            'password' => hash::make('123123'),
            'alamat'  => 'Jakarta',
            'status'    => 'Aktif',
            'jabatan'    => 'Spv',
        ]]);
    }
}
