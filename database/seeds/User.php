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
            'name' => 'User 1',
            'email' => 'admin@gmail.com',
            'password' => hash::make('123123'),
            'alamat'  => 'Jakarta',
            'status'    => 'nonAktif',
            'jabatan'    => 'Admin',
        ],[
            'kode_user' => 'USR01',
            'name' => 'User 1',
            'email' => 'Spv@gmail.com',
            'password' => hash::make('123123'),
            'alamat'  => 'Jakarta',
            'status'    => 'nonAktif',
            'jabatan'    => 'Spv',
        ]]);
    }
}
