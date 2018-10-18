<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class keranjang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keranjangs')->insert([
          'kode_keranjang'  => 'User 1',
          'kode_pembeli'  => 'pmb01',
          'kode_produk' => 'PRD01',
          'kode_promo'  => 'aaa',
          'jumlah'  => '10',
          'keterangan'  => 'mendapat barang',
          'sub_total' => '123000',
          'status'  => 'Buy',
          'created_at'  => Carbon::now(),
        ]);
    }
}
