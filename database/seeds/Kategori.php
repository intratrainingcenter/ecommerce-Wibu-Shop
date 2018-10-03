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
        DB::table('kategoris')->insert([
            'kode_kategori' => 'KTG01',
            'nama_kategori' => 'Kategori 1',
            'keterangan'    => 'Ini keterangan',
        ]);
    }
}
