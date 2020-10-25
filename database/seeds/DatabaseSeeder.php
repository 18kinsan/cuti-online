<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PegawaiTableSeeder::class);
        // $this->call(CutiTableSeeder::class);
        // $this->call(TanggalCutiTableSeeder::class);
        // $this->call(SisaCutiTableSeeder::class);
        $this->call(IzinTableSeeder::class);
        $this->call(SettingTableSeeder::class);
    }
}
