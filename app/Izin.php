<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    protected $table = 'izins';
    protected $fillable = [
      'kategori', 'atasan', 'tanggal_sekarang', 'tanggal_izin', 'tanggal_pulang', 'pukul_izin', 'pukul_pulang', 'keperluan', 'pegawai_id'
    ];

    public function user()
    {
      return $this->belongsTo(\App\User::class, 'pegawai_id');
    }
}
