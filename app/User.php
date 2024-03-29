<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_lengkap', 'username', 'password', 'role', 'path',
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

    // Relasi
    public function konten()
    {
        return $this->hasMany(Konten::class);
    }

    public function module(){
        return $this->hasMany('App\Module');
    }

    public function peserta()
    {
        return $this->hasOne(Peserta::class);
    }
    public function hasil(){
        return $this->hasMany('App\Hasil');
    }

    public function ProgramPeserta(){
        return $this->hasMany('App\ProgramPeserta');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }
}