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
        [  'kode_keranjang'  => 'cart1',
          'kode_pembeli'  => 'pmb01',
          'kode_produk' => 'PRD01',
          'jumlah'  => '10',
          'sub_total' => '123000',
          'status'  => 'Buy',
          'created_at'  => Carbon::now(),
          'updated_at'  => Carbon::now(),
        ],[  'kode_keranjang'  => 'cart2',
          'kode_pembeli'  => 'pmb01',
          'kode_produk' => 'PRD02',
          'jumlah'  => '10',
          'sub_total' => '123000',
          'status'  => 'Buy',
          'created_at'  => Carbon::now(),
          'updated_at'  => Carbon::now(),
        ]]);
    }
}
