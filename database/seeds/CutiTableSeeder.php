<?php

use Illuminate\Database\Seeder;
use App\Cuti;

class CutiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Cuti', 10)->create();
    }
}
