<?php

use Illuminate\Database\Seeder;

class Pembeli extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pembelis')->insert([
            'kode_pembeli' => 'pmb01',
            'nama_pembeli' => 'Pembeli 1',
            'jenis_kelamin' => 'Laki-laki',
            'email' =>  'pembeli@gmail.com',
            'password' => Hash::make(123),
            'foto'  =>  'images/avatar.png',
            'telepon' => '08192837465',
        ]);
    }
}
