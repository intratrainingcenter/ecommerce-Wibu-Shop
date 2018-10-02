<?php

use Illuminate\Database\Seeder;

class Produk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->insert([
            'kode_produk' => 'PRD01',
            'kode_kategori' => 'KTG01',
            'nama_produk' => 'Produk 1',
            'hpp'   => '100000',
            'harga' => '150000',
            'stok'  => '30',
            'status'    => 'Siap',
            'keterangan'    => 'Ini keterangan',
            'foto'  => 'foto.jpg'
        ]);
    }
}
