<?php

use Faker\Generator as Faker;

$factory->define(App\Izin::class, function (Faker $faker) {
    return [
      'kategori' => mt_rand(0, 2),
      'tanggal_sekarang' => now(),
      'tanggal_izin' => now(),
      'tanggal_pulang' => now(),
      'pukul_izin' => '10:00',
      'pukul_pulang' => '10:00',
      'keperluan' => $faker->paragraph(2, true),
      'pegawai_id' => \App\User::all()->random()->id_pegawai
    ];
});
