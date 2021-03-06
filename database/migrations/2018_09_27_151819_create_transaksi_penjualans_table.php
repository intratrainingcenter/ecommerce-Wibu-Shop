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
            $table->string('kode_pembeli');
            $table->integer('ongkir');
            $table->integer('grand_total');
            $table->date('tanggal');
            $table->enum('status',['Order','Paid','Pending','Sent','Received','Cancel']);
            $table->string('kode_alamat');
            $table->text('service');
            $table->text('keterangan')->nullable();
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
