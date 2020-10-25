<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIzinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kategori');
            $table->string('atasan')->nullable();
            $table->date('tanggal_sekarang');
            $table->date('tanggal_izin')->nullable();
            $table->string('pukul_izin')->nullable();
            $table->date('tanggal_pulang')->nullable();
            $table->string('pukul_pulang')->nullable();
            $table->string('keperluan');

            $table->integer('pegawai_id')->unsigned();
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
        Schema::dropIfExists('izins');
    }
}
