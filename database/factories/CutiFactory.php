<?php

use Faker\Generator as Faker;

$factory->define(App\Cuti::class, function (Faker $faker) {
    $pegawai_id = [];
    for ($i=1; $i < 11 ; $i++) {
        $pegawai_id[] = $i;
    }
    static $a = 0;

    return [
        'alasan' => $faker->paragraph(3, true),
        'pegawai_id' => $pegawai_id[$a++],
        'kategori' => $faker->randomElement(['Cuti Tahunan']),
        'lama_cuti' => 1,
        'tahun_now' => 1
    ];
});
