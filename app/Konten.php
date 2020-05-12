<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $table = 'konten';
    protected $guarded = [];

    // Relasi
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
