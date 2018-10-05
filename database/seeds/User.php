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
            [
            'kode_user' => 'USR01',
            'name' => 'User 1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'alamat'  => 'Jakarta',
            'status'    => 'nonAktif',
            'jabatan'    => 'Admin',
            ],
            [
            'kode_user' => 'USR02',
            'name' => 'User 2',
            'email' => 'spv@gmail.com',
            'password' => bcrypt('123'),
            'alamat'  => 'Jakarta',
            'status'    => 'nonAktif',
            'jabatan'    => 'Spv',
            ],
            [
            'kode_user' => 'USR03',
            'name' => 'User 3',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('123'),
            'alamat'  => 'Jakarta',
            'status'    => 'nonAktif',
            'jabatan'    => 'Owner',
            ],
        ]);
    
    }
}
