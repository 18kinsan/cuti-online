<?php

use Illuminate\Database\Seeder;

class IzinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Izin::class, 10)->create();
    }
}
