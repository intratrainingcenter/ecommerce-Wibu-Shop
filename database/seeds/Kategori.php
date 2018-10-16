<?php

use Illuminate\Database\Seeder;

class Kategori extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=1; $i < 20 ; $i++) {
        DB::table('kategoris')->insert([
            'kode_kategori' => 'KT-00'.$i,
            'nama_kategori' => 'Kategori0'.$i,
            'keterangan'    => 'Ini keterangan',
        ]);
      }
    }
}
