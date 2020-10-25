<?php

use Faker\Generator as Faker;

$factory->define(App\TanggalCuti::class, function (Faker $faker) {
    static $a = 1;

    return [
        'tgl_cuti' => now(),
        'cuti_id' => $a++
    ];
});
