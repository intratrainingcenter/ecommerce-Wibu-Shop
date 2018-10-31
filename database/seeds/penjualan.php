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
        'kode_keranjang'  => 'User 1',
          'kode_pembeli' => 'pmb01',
          'grand_total' => '123000',
          'bayar'  => '123000',
          'tanggal'    => Carbon::now(),
          'status'    => 'Received',
          'created_at' => Carbon::now(),
      ],[
          'kode_transaksi_penjualan' => 'TrR0',
          'kode_keranjang'  => 'User 1',
          'kode_pembeli' => 'pmb01',
          'grand_total' => '1023100',
          'tanggal'    => Carbon::now(),
          'bayar'  => '1923100',
          'status'    => 'Received',
          'created_at' => Carbon::now(),
      ]]);
    }
}
