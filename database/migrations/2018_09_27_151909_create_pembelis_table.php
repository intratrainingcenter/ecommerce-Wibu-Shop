<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_pembeli');
            $table->string('nama_pembeli');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan'])->nullable();
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->binary('foto');
            $table->string('telepon')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('pembelis');
    }
}
