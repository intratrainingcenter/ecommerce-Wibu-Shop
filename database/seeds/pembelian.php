<?php

use Illuminate\Database\Seeder;

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
          'kode_produk' => 'Produk1',
          'kode_user' => 'Usr-10',
          'jummlah' => '100',
          'harga'  => '20000',
          'sub_total'    => '2000000',
          'status'    => 'Done',
      ],[
        'kode_transaksi_pembelian' => 'TrRb02',
          'kode_produk' => 'Produk2',
          'kode_user' => 'Usr-10',
          'jummlah' => '100',
          'harga'  => '10000',
          'sub_total'    => '1000000',
          'status'    => 'Done',
      ]]);
    }
}
