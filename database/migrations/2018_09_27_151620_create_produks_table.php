<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_produk');
            $table->string('kode_kategori');
            $table->string('nama_produk');
            $table->integer('hpp');
            $table->integer('harga');
            $table->integer('stok')->default(0);
            $table->enum('status',['Ready', 'Not Ready'])->default('Not Ready');
            $table->text('keterangan')->nullable();
            $table->binary('foto');
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
        Schema::dropIfExists('produks');
    }
}
