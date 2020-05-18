<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';
    protected $guarded = [];

    // Relasi
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
