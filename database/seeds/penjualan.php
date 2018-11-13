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
        'kode_keranjang'  => 'cart1',
          'kode_pembeli' => 'pmb01',
          'grand_total' => '123000',
          'ongkir'  => '30000',
          'tanggal'    => Carbon::now(),
          'status'    => 'Received',
          'kode_alamat'    => 'alamat1',
          'service' => 'courier dan service',
          'keterangan' => 'catatan pembeli',
          'created_at' => Carbon::now(),
          'updated_at'  => Carbon::now(),
      ],  [  'kode_transaksi_penjualan' => 'TrR02',
        'kode_keranjang'  => 'cart2',
          'kode_pembeli' => 'pmb01',
          'grand_total' => '123000',
          'ongkir'  => '30000',
          'tanggal'    => Carbon::now(),
          'status'    => 'pending',
          'kode_alamat'    => 'alamat1',
          'service' => 'courierdan service',
          'keterangan' => 'catatan pembeli',
          'created_at' => Carbon::now(),
          'updated_at'  => Carbon::now(),
      ]]);
    }
}
