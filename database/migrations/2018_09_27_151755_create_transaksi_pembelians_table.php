<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_transaksi_pembelian');
            $table->string('kode_produk');
            $table->string('kode_user');
            $table->integer('jummlah');
            $table->integer('harga');
            $table->integer('sub_total');
            $table->enum('status',['Pending','Pengajuan','Accepted','On Proccess','Checking','Done','Cancelled']);
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
        Schema::dropIfExists('transaksi_pembelians');
    }
}
