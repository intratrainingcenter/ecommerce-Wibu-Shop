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
          'ongkir'  => '30000',
          'tanggal'    => Carbon::now(),
          'status'    => 'Received',
          'keterangan' => 'alamat, catatan pembeli',
          'created_at' => Carbon::now(),
          'updated_at'  => Carbon::now(),
      ],  [  'kode_transaksi_penjualan' => 'TrR01',
        'kode_keranjang'  => 'User 3',
          'kode_pembeli' => 'pmb01',
          'grand_total' => '123000',
          'ongkir'  => '30000',
          'tanggal'    => Carbon::now(),
          'status'    => 'pending',
          'keterangan' => 'alamat, catatan pembeli',
          'created_at' => Carbon::now(),
          'updated_at'  => Carbon::now(),
      ],[
          'kode_transaksi_penjualan' => 'TrR0',
          'kode_keranjang'  => 'User 2',
          'kode_pembeli' => 'pmb01',
          'grand_total' => '1023100',
          'tanggal'    => Carbon::now(),
          'ongkir'  => '30000',
          'status'    => 'Received',
          'keterangan' => 'alamat, catatan pembeli',
          'created_at' => Carbon::now(),
          'updated_at'  => Carbon::now(),
      ]]);
    }
}
