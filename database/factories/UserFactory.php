<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'nip' => $faker->numberBetween(10000, 999999),
        'nama' => $faker->name,
        'jabatan' =>$faker->jobTitle,
        'role' => 0,
        'email' => $faker->unique()->safeEmail,
        'tgl_masuk' => date("Y-m-d"),
        'password' => bcrypt('12345678')
    ];
});
