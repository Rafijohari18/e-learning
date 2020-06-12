<?php

use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengaturan')->insert([
        	'email' => 'blkkppnhb@gmail.com',
        	'no_tlp' => '081214687886',
        	'alamat' => 'Kp. Bojongnangka RT. 03/02 Kel. Sukamenak Kec. Purbaratu Kota Tasikmalaya - Jawa Barat',
        	'footer' => 'BLKK Ponpes Nurul Hidayah Bojongnangka.',
            'informasi' => 'default.png',
            'program' => 'default.png',
            'login' => 'default.png',
            'checkout' => 'default.png',
            'logo' => 'default.png',
            'no_rek' => 'Silahkan transfer bukti pembayaran ke no rek 000000 atas nama blkkponpesbojongnangka bank BRI',
            'password_default' => 'blkkponpesbojongnangka',
        ]);

        DB::table('timer')->insert([
            'waktu' => 60
        ]);
    }
}
