<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Produk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=1; $i <= 7 ; $i++) {

        DB::table('produks')->insert([
            'kode_produk' => 'PRD0'.$i,
            'kode_kategori' => 'KT-00'.$i,
            'nama_produk' => 'Produk '.$i,
            'hpp'   => '100000',
            'harga' => '150000',
            'stok'  => '30',
            'status'    => 'Siap',
            'keterangan'    => 'Ini keterangan',
            'foto'  => 'images/product.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
      }
    }
}
