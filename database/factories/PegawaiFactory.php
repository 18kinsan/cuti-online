<?php

use Faker\Generator as Faker;

$factory->define(App\Pegawai::class, function (Faker $faker) {
    return [
        'nip' => $faker->numberBetween(10000, 999999),
        'nama' => $faker->name,
        'jabatan' =>$faker->jobTitle,
        'role' => 0,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('aaaaaaaa')
    ];
});
