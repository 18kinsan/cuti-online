<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'users';
     protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'nip','nama', 'jabatan', 'no_telp', 'alamat', 'role', 'email', 'tgl_masuk' ,'atasan_1', 'atasan_2', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      public function cuti()
    {
      return $this->hasMany(\App\Cuti::class, 'id_cuti');
    }

    public function sisacuti()
    {
      return $this->hasMany(\App\SisaCuti::class, 'pegawai_id');
   }

    public function isAdmin(){
      if($this->role == 1) return true;

      return false;
    }
}
