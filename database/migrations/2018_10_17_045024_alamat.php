<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alamat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_pembeli');
            $table->string('kode_alamat');
            $table->string('nama_alamat');
            $table->text('alamat');
            $table->string('id_provinsi');
            $table->string('provinsi');
            $table->string('id_kota');
            $table->string('kota');
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
        Schema::dropIfExists('alamats');
    }
}
