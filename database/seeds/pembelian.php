<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class pembelian extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('transaksi_pembelians')->insert([
        [  'kode_transaksi_pembelian' => 'TrRb01',
          'kode_produk' => 'PRD01',
          'kode_user' => 'USR01',
          'jummlah' => '100',
          'harga'  => '20000',
          'sub_total'    => '2000000',
          'status'    => 'Done',
          'created_at' => Carbon::now(),
      ],[
        'kode_transaksi_pembelian' => 'TrRb02',
          'kode_produk' => 'PRD02',
          'kode_user' => 'USR01',
          'jummlah' => '100',
          'harga'  => '10000',
          'sub_total'    => '1000000',
          'status'    => 'Done',
          'created_at' => Carbon::now(),
      ]]);
    }
}
