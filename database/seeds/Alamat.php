<?php

use Illuminate\Database\Seeder;

class Alamat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alamats')->insert([
            'kode_pembeli'   => 'pmb01',
            'kode_alamat'    => 'alamat1',
            'nama_alamat'    => 'alamat pembeli',
            'alamat'         => 'jalan',
            'id_provinsi'    => 1,
            'provinsi'       => 'provinsi',
            'id_kota'        => 1,
            'kota'           => 'kota',
        ]
    );
    }
}
