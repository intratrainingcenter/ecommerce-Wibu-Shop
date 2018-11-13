<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Kategori::class);
        $this->call(Produk::class);
        $this->call(User::class);
        $this->call(pembelian::class);
        $this->call(penjualan::class);
        $this->call(Pembeli::class);
        $this->call(Promo::class);
        $this->call(keranjang::class);
    }
}
