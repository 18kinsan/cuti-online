<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanggalCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggal_cutis', function (Blueprint $table) {
            $table->increments('id_tanggal');
            $table->date('tgl_cuti');
            $table->integer('cuti_id')->unsigned();
            $table->foreign('cuti_id')->references('id_cuti')->on('cutis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanggal_cutis');
    }
}
