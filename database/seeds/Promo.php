<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Promo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promos')->insert([
                'kode_promo'    => 'promo1',
                'nama_promo'    => 'promo satu',
                'min'           => 2,
                'max'           => 3,
                'tanggal_awal'  => Carbon::now(),
                'tanggal_akhir' => Carbon::now(),
                'jenis_promo'   => 'Diskon',
                'diskon'        => 1000,
            ]
        );

        DB::table('opsi_promos')->insert([
                'kode_promo'    => 'promo1',
                'kode_produk'   => 'PRD02',
            ]);        

        DB::table('opsi_promo_temporaries')->insert([
            'kode_promo'    => 'promo1',
            'kode_produk'   => 'PRD02',
        ]); 
    }
}
