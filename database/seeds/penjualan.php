<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class penjualan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('transaksi_penjualans')->insert([
        [  'kode_transaksi_penjualan' => 'TrR01',
          'kode_keranjang' => 'User 1',
          'jumlah' => '10',
          'grand_total' => '123000',
          'bayar'  => '123000',
          'tanggal'    => Carbon::now(),
          'status'    => 'Received',
      ],[
          'kode_transaksi_penjualan' => 'TrR0',
          'kode_keranjang' => 'User 1',
          'jumlah' => '10',
          'grand_total' => '123100',
          'tanggal'    => Carbon::now(),
          'bayar'  => '123100',
          'status'    => 'Received',
      ]]);
    }
}
