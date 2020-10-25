<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TanggalCuti extends Model
{
  protected $table = 'tanggal_cutis';
  protected $primaryKey = 'id_tanggal';
  protected $fillable = [
    'tgl_cuti'
  ];


  public function cuti()
  {
    return $this->belongsTo(\App\Cuti::class, 'cuti_id', 'id_cuti');
  }
}
