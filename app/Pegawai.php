<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
    use Notifiable;

    protected $table = 'pegawais';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
      'nip', 'nama', 'jabatan', 'no_telp', 'alamat', 'role', 'email', 'password'
    ];

    public function cuti()
    {
      return $this->hasMany(\App\Cuti::class, 'id_cuti');
    }

    public function isAdmin(){
      if($this->role == 1) return true;

      return false;
    }
}
