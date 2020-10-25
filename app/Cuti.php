<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
  protected $table = 'cutis';
  protected $primaryKey = 'id_cuti';
  protected $fillable = [
    'alasan', 'pegawai_id', 'kategori_cuti_id', 'kategori', 'lama_cuti', 'hp', 'alamat'
  ];

  public function kategoricuti()
  {
    return $this->hasOne(\App\KategoriCuti::class, 'id_kategori');
  }

  public function sisacutis()
  {
    return $this->hasMany(\App\SisaCuti::class, 'cuti_id');
  }

  public function user()
  {
    return $this->belongsTo(\App\User::class, 'pegawai_id', 'id_pegawai');
  }

  public function tgl_cuti()
  {
    return $this->hasMany(\App\TanggalCuti::class, 'cuti_id', 'id_cuti');
  }
}
