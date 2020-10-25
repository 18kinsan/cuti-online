<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutis', function (Blueprint $table) {
            $table->increments('id_cuti');
            $table->text('alasan');
            $table->integer('pegawai_id')->unsigned();

            $table->foreign('pegawai_id')->references('id_pegawai')->on('users')->onDelete('cascade');
            $table->string('kategori');
            $table->string('alamat')->nullable();
            $table->integer('hp')->nullable();
            $table->integer('lama_cuti');
            $table->integer('tahun_before')->default(0);
            $table->integer('tahun_now')->default(0);
            $table->integer('progress')->default(0);
            $table->integer('no_surat')->unique()->nullable();
            $table->date('tgl_surat')->nullable();
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
        Schema::dropIfExists('cutis');
    }
}
