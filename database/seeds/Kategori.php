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
      for ($i=1; $i < 10 ; $i++) {
        DB::table('kategoris')->insert([
            'kode_kategori' => 'KTG0'.$i,
            'nama_kategori' => 'Kategori0'.$i,
            'keterangan'    => 'Ini keterangan',
        ]);
      }
    }
}
