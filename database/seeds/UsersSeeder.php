<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'nama_lengkap' => 'Administrator',
        	'username' => 'admin',
        	'password' => bcrypt('admin'),
        	'role' => 'Admin',
            'path' => 'default.png'
        ]);

        DB::table('users')->insert([
            'nama_lengkap' => 'Peserta',
            'username' => 'peserta',
            'password' => bcrypt('peserta'),
            'role' => 'Peserta',
            'path' => 'default.png'
        ]);
    }
}
