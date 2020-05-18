<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';
    protected $guarded = [];

    // Relasi
	// public function program()
	// {
	//  	return $this->belongsToMany(Program::class);
	// }
}
