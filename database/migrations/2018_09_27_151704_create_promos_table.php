<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_promo');
            $table->string('nama_promo');
            $table->string('kode_produk');
            $table->integer('min');
            $table->integer('max');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->enum('jenis_promo',['Diskon', 'Bonus']);
            $table->integer('diskon')->nullable();
            $table->string('kode_produk_bonus')->nullable();
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
        Schema::dropIfExists('promos');
    }
}
