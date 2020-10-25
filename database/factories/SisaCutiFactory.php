<?php

use Faker\Generator as Faker;

$factory->define(App\SisaCuti::class, function (Faker $faker) {
    $pegawai_id = [];
    for ($i=1; $i < 11 ; $i++) {
        $pegawai_id[] = $i;
    }
    static $b = 0;
    return [
        'tahun' => 2019,
        'jumlah_cuti' => 1,
        'pegawai_id' => $pegawai_id[$b++]
    ];
});
