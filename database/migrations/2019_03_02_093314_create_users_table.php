<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_pegawai');
            $table->string('nip')->unique();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('no_telp');
            $table->string('alamat');
            $table->integer('role')->default(0);
            $table->string('email')->unique();
            $table->date('tgl_masuk')->nullable();
            $table->string('atasan_1')->nullable();
            $table->string('atasan_2')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
