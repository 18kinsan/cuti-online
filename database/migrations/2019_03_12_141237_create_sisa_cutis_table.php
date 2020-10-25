<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSisaCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisa_cutis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tahun');
            $table->integer('jumlah_cuti');

            $table->integer('pegawai_id')->unsigned();
            $table->integer('cuti_id')->unsigned()->nullable();
            $table->foreign('cuti_id')->references('id_cuti')->on('cutis')->onDelete('cascade');
            $table->foreign('pegawai_id')->references('id_pegawai')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('sisa_cutis');
    }
}
