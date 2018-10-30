<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiPenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_penjualans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_transaksi_penjualan');
            $table->string('kode_keranjang');
            $table->string('kode_produk');
            $table->string('kode_pembeli');
            $table->integer('jumlah');
            $table->integer('grand_total');
            $table->integer('bayar');
            $table->date('tanggal');
            $table->enum('status',['Pending','Sent','Received']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_penjualans');
    }
}
