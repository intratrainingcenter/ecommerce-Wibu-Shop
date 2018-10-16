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
      for ($i=1; $i < 20 ; $i++) {

        DB::table('produks')->insert([
            'kode_produk' => 'PRD0'.$i,
            'kode_kategori' => 'KTG01',
            'nama_produk' => 'Produk '.$i,
            'hpp'   => '100000',
            'harga' => '150000',
            'stok'  => '30',
            'status'    => 'Siap',
            'keterangan'    => 'Ini keterangan',
            'foto'  => 'images/foto.png'
        ]);
      }
    }
}
