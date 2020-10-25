<?php

use Illuminate\Database\Seeder;
use App\User;

class PegawaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'nip' => '888888',
          'nama' => 'Cupi Supriyati',
          'jabatan' => 'Admin LTE',
          'no_telp' => '0809032',
          'alamat' => 'jogja',
          'role' => 1,
          'email' => 'cupi@komsi.com',
          'password' => bcrypt('admin')
        ]);
        // factory('App\User', 10)->create();
    }
}
