<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SisaCuti extends Model
{
      protected $fillable = [
         'tahun', 'jumlah_cuti', 'pegawai_id', 'cuti_id'
      ];

      public function cuti()
      {
        return $this->belongsTo(\App\Cuti::class, 'cuti_id', 'id');
      }
}
