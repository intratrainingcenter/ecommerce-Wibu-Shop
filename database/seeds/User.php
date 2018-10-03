<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'kode_user' => 'USR01',
            'name' => 'User 1',
            'email' => 'admin@gmail.com',
            'password' => '123',
            'alamat'  => 'Jakarta',
            'status'    => 'nonAktif',
            'jabatan'    => 'Admin',
        ]);
    
    }
}
