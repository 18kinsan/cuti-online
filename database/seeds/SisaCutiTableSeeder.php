<?php

use Illuminate\Database\Seeder;

class SisaCutiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory('App\SisaCuti', 10)->create();
    }
}
