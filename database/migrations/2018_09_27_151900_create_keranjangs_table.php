<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeranjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_keranjang');
            $table->string('kode_pembeli');
            $table->string('kode_produk');
            $table->string('kode_promo')->nullable();
            $table->integer('jumlah')->default(1);
            $table->text('keterangan')->nullable();
            $table->integer('sub_total');
            $table->enum('status',['Pending','Buy'])->default('Pending');
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
        Schema::dropIfExists('keranjangs');
    }
}
