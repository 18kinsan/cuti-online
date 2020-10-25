<?php

use Illuminate\Database\Seeder;
use App\TanggalCuti;

class TanggalCutiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\TanggalCuti', 10)->create();
    }
}
