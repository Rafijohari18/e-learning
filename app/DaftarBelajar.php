<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarBelajar extends Model
{
    protected $table = 'daftar_belajar';
    protected $guarded = [];

    // Relasi
    public function user()
    {
    	return $this->belongsToMany(User::class);
    }

    public function module()
    {
    	return $this->belongsToMany(Module::class);
    }
}
